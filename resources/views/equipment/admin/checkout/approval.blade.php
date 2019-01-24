@extends('equipment.layouts.admin')

@section('title')
    Late Fee Email Notifications (Approval Required)
@endsection

@section('content')
	<div class="col-12">

		{!! BootForm::open()->post()->action(route('equipment.admin.checkout.approval')) !!}

			<table class="table">
				<thead>
				<tr>
					<th scope="col">Patron</th>
					<th scope="col">Equipment</th>
					<th scope="col">Late By</th>
					<th scope="col" style="width: 175px;">Fee</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
					@foreach ($checkouts->groupBy('equipment.group') as $key => $groups)

						<tr class="table-dark">
							<td colspan="5" style="font-weight: bold;">
								{{ strtoupper($key) }}
							</td>
						</tr>

						@foreach($groups as $checkout)

							<tr style="line-height: 2.5;">
								<td>
									{{ $checkout->patron->getFullNameAttribute() }}
									{!! BootForm::hidden("checkouts[]")->value($checkout->id) !!}
								</td>
								<td>
									{{ $checkout->equipment->getDisplayName() }}
								</td>
								<td style="@if(is_null($checkout->checked_in_at)) color:red; @endif">
									{{ str_replace(' after', '', (is_null($checkout->checked_in_at))?now()->diffForHumans($checkout->due_at):$checkout->checked_in_at->diffForHumans($checkout->due_at)) }}
								</td>
								<td>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="text" name="fees[]" id="fees[]" value="{{ $checkout->calculateLateFee() }}" class="form-control">
										<div class="input-group-append">
											<span class="input-group-text">.00</span>
										</div>
									</div>
								</td>
								<td>
									{!! BootForm::select("Action", "actions[]")
													->options([
														'notify' => 'Notify',
														'remove' => 'Remove',
														'pending' => 'Pending',
													])
													->select('pending')->hideLabel();
									!!}
								</td>
							</tr>

						@endforeach

					@endforeach
				</tbody>
				<tfoot>
				<tr>
					<td colspan="5">

					</td>
				</tr>
				</tfoot>
			</table>

			<div class="row mt-2 justify-content-end"> {!! BootForm::submit('Approve') !!} </div>

		{!! BootForm::close() !!}

	</div>
@endsection

@push('footer-scripts')
<script type="text/javascript">
	$(function () {

		$('input:checkbox').change(function() {
			var parent = $(this).parents('.list-group-item');
			var cousin = parent.find('input:text')
			if (this.checked) {
				cousin.prop( 'disabled', false );
			}
			else {
				cousin.prop( 'disabled', true );
			}
		});

		$(document).on('click', 'button[type="submit"]', function(){
			$(this).prop('disabled', true);
			$(this).closest('form').submit();
		});
	});



	
</script>
@endpush