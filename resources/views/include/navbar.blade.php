<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="{{ route('landingPage') }}">Warehouse</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if(!request()->routeIs('landingPage'))
                @auth
                    @if(auth()->user()->role === \App\Models\Roles::ADMIN)
                        <li class="nav-item {{ request()->routeIs('items.all') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('items.all') }}">Items</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item {{ request()->routeIs('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            @endif
        </ul>
    </div>
</nav>
