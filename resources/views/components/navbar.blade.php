<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3" role="navigation">
    <div class="container">
        {{-- Logo + Nome struttura --}}
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-gold fw-bold fs-4 nav-title"
            title="Torna alla Home">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa"
                class="nav-logo me-2">
            La Casa di MiDa
        </a>

        {{-- Toggler per dispositivi mobili --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Mostra navigazione">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Contenuto navbar --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a href="{{ route('camere.index') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('camere.index') ? 'active text-gold' : 'text-dark' }}"
                        title="Le nostre camere">Camere</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('bio') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('bio') ? 'active text-gold' : 'text-dark' }}"
                        title="Chi siamo">La Struttura</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cosaFare') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('cosaFare') ? 'active text-gold' : 'text-dark' }}"
                        title="Cosa fare a Roma">Cosa fare a Roma</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contatti') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('contatti') ? 'active text-gold' : 'text-dark' }}"
                        title="Contattaci">Contatti</a>
                </li>

                {{-- Bottone Prenota solo se non autenticato --}}
                @guest
                    <li class="nav-item d-block d-lg-none">
                        <a href="{{ route('booking.create') }}" class="btn btn-gold rounded-pill px-4 text-center"
                            title="Prenota ora">Prenota ora</a>
                    </li>

                    <li class="nav-item d-none d-lg-block ms-3">
                        <a href="{{ route('booking.create') }}" class="btn btn-gold rounded-pill px-4"
                            title="Prenota la tua camera">Prenota ora</a>
                    </li>
                @endguest

                {{-- Dropdown autenticazione --}}
                @auth
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle fw-semibold text-dark" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.prenotazioni') }}">Gestione Prenotazioni</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="px-3">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
