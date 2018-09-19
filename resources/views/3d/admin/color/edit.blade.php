@extends('3d.layouts.admin')

@section('content')

	{!! BootForm::open()->action(route('3d.color.update', $color))->put() !!}
	  {!! BootForm::bind($color) !!}
	  {!! BootForm::text('Name', 'name') !!}
	  <div id="cp2" class="input-group colorpicker-component">
	  {!! BootForm::text('Color', 'hex_code') !!}
  		
    	<span class="input-group-addon"><i></i></span>
	  </div>
	
	  
	  {!! BootForm::submit('Submit') !!}
	{!! BootForm::close() !!} 

@endsection

@push('custom-scripts')
	<!-- Bootstrap Colorpicker -->
	<script src="/printing/js/bootstrap-colorpicker.min.js"></script>
	<script>
        $(function() {
            $('#cp2').colorpicker();
        });
    </script>
@endpush