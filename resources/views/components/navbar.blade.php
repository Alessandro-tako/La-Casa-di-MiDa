<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3" role="navigation">
    <div class="container">
        {{-- Logo + Nome struttura --}}
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-gold fw-bold fs-4"
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

        {{-- Link di navigazione --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a href="{{ route('camere.index') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('camere.index') ? 'active text-gold' : 'text-dark' }}"
                        title="Le nostre camere">Camere</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cosaFare') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('cosa-fare-a-roma') ? 'active text-gold' : 'text-dark' }}"
                        title="Cosa fare a Roma">Cosa fare a Roma</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contatti') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('contatti') ? 'active text-gold' : 'text-dark' }}"
                        title="Contattaci">Contatti</a>
                </li>
            </ul>

            {{-- Pulsante prenotazione --}}
            <div class="d-none d-lg-block ms-3">
                <a href="#prenota" class="btn btn-gold rounded-pill px-4" title="Prenota la tua camera">Prenota ora</a>
            </div>
        </div>
    </div>
</nav>
