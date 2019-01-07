<!-- sidebar menu -->
<div id="menu">
	<div class="row btn btn-default sidebar-btn"> <span>Menu <i class="fa fa-chevron-down"></i></span></div>
</div>
<div id="menuOpts">
	<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin') }}"><span><i class="fa fa-home" aria-hidden="true"></i> Home</span></a>
	<a class="row btn btn-default sidebar-btn" href="{{ route('3d.admin') }}"><span><i class="fa fa-cube" aria-hidden="true"></i> 3d Printing</span></a>
	<!-- history dropdown -->
	<div class="row btn btn-default sidebar-btn" id="history"><span><i class="fa fa-history" aria-hidden="true"></i> History <i class="fa fa-chevron-down"></i></span></div>
	<div id="historyOpts">
		
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.checkouts', ['type' => 'camera-in']) }}"><span>&emsp;<i class="fa fa-camera" aria-hidden="true"></i> Camera</span></a>
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.checkouts', ['type' => 'other-in']) }}"><span>&emsp;<i class="fa fa-headphones" aria-hidden="true"></i> Other</span></a>

	</div>
	<!-- end history dropdown -->
	<!-- settings dropdown -->
	<div class="row btn btn-default sidebar-btn" id="settings"><span><i class="fa fa-cog" aria-hidden="true"></i> Settings <i class="fa fa-chevron-down"></i></span></div>
	<div id="settingsOpts">
		
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.date.index') }}"><span>&emsp; Dates</span></a>
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.equipment.index') }}"><span>&emsp; Equipment</span></a>
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.equipment-type.index') }}"><span>&emsp; Types</span></a>

	</div>
	<!-- end settings dropdown -->
	<!-- admin dropdown -->
	<div class="row btn btn-default sidebar-btn" id="admin"><span><i class="fa fa-lock" aria-hidden="true"></i> Admin <i class="fa fa-chevron-down"></i></span></div>
	<div id="adminOpts">
		
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.checkout.approval') }}"><span>&emsp;<i class="fa fa-check" aria-hidden="true"></i> Approve</span></a>
		<a class="row btn btn-default sidebar-btn" href="{{ route('equipment.admin.report.index') }}"><span>&emsp;<i class="fa fa-table" aria-hidden="true"></i> Report</span></a>

	</div>
	<!-- end settings dropdown -->
	
</div>

<!-- end sidebar menu -->