<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3" role="navigation" aria-label="Main navigation">
    <div class="container">
        {{-- Logo + Nome struttura --}}
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-gold fw-bold fs-4 nav-title"
            title="{{ __('ui.back_to_home') }}">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa"
                class="nav-logo me-2" width="40" height="40">
            La Casa di MiDa
        </a>

        {{-- Toggler per dispositivi mobili --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('ui.toggle_nav') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Contenuto navbar --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">

                {{-- Camere --}}
                <li class="nav-item">
                    <a href="{{ route('camere.index') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('camere.index') ? 'active text-gold' : 'text-dark' }}"
                        title="{{ __('ui.rooms_title') }}">
                        {{ __('ui.rooms') }}
                    </a>
                </li>

                {{-- La Struttura --}}
                <li class="nav-item">
                    <a href="{{ route('bio') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('bio') ? 'active text-gold' : 'text-dark' }}"
                        title="{{ __('ui.structure_title') }}">
                        {{ __('ui.structure') }}
                    </a>
                </li>

                {{-- Cosa Fare --}}
                <li class="nav-item">
                    <a href="{{ route('cosaFare') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('cosaFare') ? 'active text-gold' : 'text-dark' }}"
                        title="{{ __('ui.thingstodo_title') }}">
                        {{ __('ui.thingstodo') }}
                    </a>
                </li>

                {{-- Contatti --}}
                <li class="nav-item">
                    <a href="{{ route('contatti') }}"
                        class="nav-link fw-semibold {{ request()->routeIs('contatti') ? 'active text-gold' : 'text-dark' }}"
                        title="{{ __('ui.contact_title') }}">
                        {{ __('ui.contact') }}
                    </a>
                </li>

                {{-- Bottone Prenota (solo per utenti non autenticati) --}}
                @guest
                    <li class="nav-item d-block d-lg-none mt-2">
                        <a href="{{ route('booking.create') }}" class="btn btn-gold rounded-pill px-4 text-center w-100"
                            title="{{ __('ui.book_now_title') }}">
                            {{ __('ui.book_now') }}
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block ms-3">
                        <a href="{{ route('booking.create') }}" class="btn btn-gold rounded-pill px-4"
                            title="{{ __('ui.book_now_title') }}">
                            {{ __('ui.book_now') }}
                        </a>
                    </li>
                @endguest

                {{-- Dropdown utente autenticato --}}
                @auth
                    <li class="nav-item dropdown ms-3">
                        {{-- se la campanella non va accanto al nome togliere d-flex justify-content-between align-items-center --}}
                        <a class="nav-link dropdown-toggle fw-semibold text-dark d-flex justify-content-between align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            @livewire('admin.notifiche-prenotazioni')
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                    href="{{ route('admin.prenotazioni') }}">
                                    Gestione Prenotazioni
                                    {{-- @livewire('admin.notifiche-prenotazioni') --}}
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="px-3">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                {{-- Selettore lingua --}}
                <li class="nav-item dropdown">
                    <form action="{{ route('locale.set') }}" method="POST" class="d-inline">
                        @csrf
                        <select name="locale" onchange="this.form.submit()"
                            class="form-select form-select-sm border-0 bg-white">
                            <option value="it" @selected(app()->getLocale() === 'it')>IT</option>
                            <option value="en" @selected(app()->getLocale() === 'en')>EN</option>
                            <option value="fr" @selected(app()->getLocale() === 'fr')>FR</option>
                            <option value="de" @selected(app()->getLocale() === 'de')>DE</option>
                            <option value="es" @selected(app()->getLocale() === 'es')>ES</option>
                        </select>
                    </form>
                </li>


            </ul>
        </div>
    </div>
</nav>
