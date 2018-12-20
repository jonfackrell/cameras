<!-- sidebar menu -->
<div id="menu">
	<div class="row btn btn-default sidebar-btn"> <span>Menu <i class="fa fa-chevron-down"></i></span></div>
</div>
<div id="menuOpts">
	<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin') }}"><span><i class="fa fa-home" aria-hidden="true"></i> Home</span></a>
	<a class="row btn btn-default sidebar-btn" href="{{ route('3d.admin') }}"><span><i class="fa fa-cube" aria-hidden="true"></i> 3d Printing</span></a>
	<div class="row btn btn-default sidebar-btn" id="history"><span><i class="fa fa-history" aria-hidden="true"></i> History <i class="fa fa-chevron-down"></i></span></div>
	<div id="historyOpts">
		
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.checkouts', ['type' => 'camera-in']) }}"><span>&emsp;<i class="fa fa-camera" aria-hidden="true"></i> Camera</span></a>
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.checkouts', ['type' => 'other-in']) }}"><span>&emsp;<i class="fa fa-headphones" aria-hidden="true"></i> Other</span></a>

	</div>
	<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.report.index') }}"><span><i class="fa fa-table" aria-hidden="true"></i> Report Export</span></a>
</div>

<!-- end sidebar menu -->