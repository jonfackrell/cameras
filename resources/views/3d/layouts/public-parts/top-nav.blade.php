<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="border-color: #ffffff;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" style="color: #ffffff;"></span>
                <span class="icon-bar" style="color: #ffffff;"></span>
                <span class="icon-bar" style="color: #ffffff;"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img alt="" src="{{ $public->where('name', 'LOGO')->first()->value ?? '' }}" style="height: 28px; width: auto;">
            </a>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('3d.printers') }}" class="navbar-link">3D Printers</a>
                </li>
                <li>
                    <a href="{{ route('3d.options') }}" class="navbar-link">Upload</a>
                </li>
                <li>
                    <a href="{{ route('3d.history') }}" class="navbar-link">View History</a>
                </li>
                <li>
                    <a href="{{ route('3d.policy') }}" class="navbar-link">Policy</a>
                </li>
                <li>
                    <a href="{{ route('3d.contact') }}" class="navbar-link">Contact Us</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            @if(auth()->guard('patrons')->check() && strlen(auth()->guard('patrons')->user()->email) > 3)
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('3d.register') }}" class="navbar-link">Hi {{ auth()->guard('patrons')->user()->first_name }}!</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>