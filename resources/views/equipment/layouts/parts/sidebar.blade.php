<!-- sidebar menu -->
<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin') }}"><span class="col-3"><i class="fa fa-home" aria-hidden="true"></i></span><span class="col">Home</span></a>
<a class="row btn btn-default sidebar-btn" href="{{ route('3d.admin') }}"><span class="col-3"><i class="fa fa-cube" aria-hidden="true"></i></span><span class="col">3d Printing</span></a>
<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.checkouts', ['type' => 'digital-in']) }}"><span class="col-3"><i class="fa fa-history" aria-hidden="true"></i></span><span class="col">Camera History</span></a>
<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.checkouts', ['type' => 'in-house-in']) }}"><span class="col-3"><i class="fa fa-history" aria-hidden="true"></i></span><span class="col">In-House History</span></a>

<!-- end sidebar menu -->