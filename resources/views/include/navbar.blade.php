<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <p class="navbar-brand">Warehouse</p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">home</a>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
