<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3" role="navigation">
    <div class="container">
        <a class="navbar-brand fw-bold text-gold fs-4 nav-title" href="{{route('home')}}">
            La Casa di MiDa
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->routeIs('camere.index') ? 'active' : '' }}"
                        href="{{ route('camere.index') }}">Camere</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->routeIs('cosa-fare-a-roma') ? 'active' : '' }}"
                        href="{{ route('cosaFare') }}">Cosa fare a Roma</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->routeIs('contatti') ? 'active' : '' }}"
                        href="{{ route('contatti') }}">Contatti</a>
                </li>
            </ul>
            <div class="d-none d-lg-block ms-3">
                <a href="#" class="btn btn-gold rounded-pill px-4">Prenota ora</a>
            </div>
        </div>
    </div>
</nav>
