<header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-auto mb-2 mb-lg-0 text-center">
                <ul class="nav justify-content-center">
                    <li><a href="#" class="nav-link px-2 link-secondary">Beranda</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg text-center text-lg-end">
                @if(Auth::check())
                    <a href="{{ url('logout') }}" class="btn btn-outline-primary me-2">Logout</a>
                @else
                    <a href="{{ url('register') }}" class="btn btn-outline-primary me-2">Register</a>
                    <a href="{{ url('login') }}" class="btn btn-outline-primary me-2">Login</a>
                @endif
            </div>
        </div>
    </div>
</header>