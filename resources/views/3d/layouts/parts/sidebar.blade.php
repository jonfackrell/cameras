<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Admin</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{ route('3d.admin') }}"><i class="fa fa-home"></i> Home</a>
            </li>
            @can('accept-payments')
                <li>
                    <a href="{{ route('3d.payment.index') }}"><i class="fa fa-usd"></i> Payment</a>
                </li>
            @endcan
            @if(auth()->guard('web')->user()->isSuperUser() || auth()->guard('web')->user()->can('view-colors') || auth()->guard('web')->user()->can('view-departments') || auth()->guard('web')->user()->can('view-filaments') || auth()->guard('web')->user()->can('view-notifications') || auth()->guard('web')->user()->can('view-printers') || auth()->guard('web')->user()->can('view-statuses') || auth()->guard('web')->user()->can('view-users'))
            <li><a><i class="fa fa-cog"></i>Settings <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('view-colors')
                        <li><a href="{{ route('3d.color.index') }}">Colors</a></li>
                    @endcan
                    @can('view-departments')
                        <li><a href="{{ route('3d.department.index') }}">Departments</a></li>
                    @endcan
                    @can('view-filaments')
                        <li><a href="{{ route('3d.filament.index') }}">Filaments</a></li>
                    @endcan
                    @can('view-notifications')
                        <li><a href="{{ route('3d.notification.index') }}">Notifications</a></li>
                    @endcan
                    @if(auth()->guard('web')->user()->isSuperUser())
                        <li><a href="{{ route('3d.admin.patron.index') }}">Patrons</a></li>
                    @endcan
                    @can('view-printers')
                        <li><a href="{{ route('3d.printer.index') }}">Printers</a></li>
                    @endcan
                    @can('view-statuses')
                        <li><a href="{{ route('3d.status.index') }}">Statuses</a></li>
                    @endcan
                    @can('view-users')
                        <li><a href="{{ route('3d.user.index') }}">Users</a></li>
                    @endcan
                    @if(auth()->guard('web')->user()->isSuperUser())
                        <li><a href="{{ route('3d.settings.index') }}">System Settings</a></li>
                    @endcan
                </ul>
            </li>
            @endif
            <li><a href="{{ route('equipment.admin') }}"><i class="fa fa-camera"></i> Equipment</a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Web</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{ route('3d.options') }}"><i class="fa fa-laptop"></i> Upload</a>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->