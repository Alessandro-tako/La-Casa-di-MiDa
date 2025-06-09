<footer class="bg-black text-light pt-5 pb-4 mt-5 border-top border-secondary" role="contentinfo">
    <div class="container">

        {{-- Logo centrale --}}
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/loghi/logo-nero-oro.jpg') }}" alt="Logo La Casa di MiDa"
                style="max-width: 100px;">
        </div>

        <div class="row g-4 justify-content-between">

            {{-- Contatti --}}
            <div class="col-12 col-md-4 text-center text-md-start">
                <h2 class="h5 fw-bold font-serif mb-3 text-gold">{{ __('ui.contact') }}</h2>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt-fill me-2" aria-hidden="true"></i>
                        <span>Via Carlo Cattaneo 10, Roma (RM)</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope-fill me-2" aria-hidden="true"></i>
                        <a href="mailto:info@lacasadimida.it"
                            class="link-light text-decoration-none">info@lacasadimida.it</a>
                    </li>
                    <li>
                        <i class="bi bi-phone-fill me-2" aria-hidden="true"></i>
                        <a href="tel:+393488548971" class="link-light text-decoration-none">+39 3488548971</a>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-whatsapp me-2" aria-hidden="true"></i>
                        <a href="https://wa.me/393488548971" target="_blank" rel="noopener"
                            class="link-light text-decoration-none" title="Contattaci su WhatsApp">+39 3488548971</a>
                    </li>
                </ul>
            </div>

            {{-- Link utili --}}
            <div class="col-12 col-md-3 text-center text-md-start">
                <h2 class="h5 fw-bold font-serif mb-3 text-gold">{{ __('ui.useful_links') }}</h2>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}" class="link-light text-decoration-none">{{ __('ui.home') }}</a>
                    </li>
                    <li><a href="{{ route('camere.index') }}"
                            class="link-light text-decoration-none">{{ __('ui.rooms') }}</a></li>
                    <li><a href="{{ route('bio') }}"
                            class="link-light text-decoration-none">{{ __('ui.structure') }}</a></li>
                    <li><a href="{{ route('cosaFare') }}"
                            class="link-light text-decoration-none">{{ __('ui.thingstodo') }}</a></li>
                    <li><a href="{{ route('contatti') }}"
                            class="link-light text-decoration-none">{{ __('ui.contact') }}</a></li>
                    <li><a href="{{ route('termini') }}"
                            class="link-light text-decoration-none">{{ __('ui.terms') }}</a></li>
                </ul>
            </div>

            {{-- Social --}}
            <div class="col-12 col-md-3 text-center text-md-start">
                <h2 class="h5 fw-bold font-serif mb-3 text-gold">{{ __('ui.follow_us') }}</h2>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a href="https://www.instagram.com/la_casa_di_mida/" target="_blank" rel="noopener"
                        class="text-light fs-4 me-3" title="Instagram La Casa di MiDa">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=61575152180746&locale=it_IT" target="_blank"
                        rel="noopener" class="text-light fs-4" title="Facebook La Casa di MiDa">
                        <i class="bi bi-facebook" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <hr class="border-secondary my-4">

            {{-- Copyright --}}
            <div class="text-center small">
                <p class="mb-1">La Casa di MiDa - P.IVA: IT17800951000</p>
                <p class="mb-1">&copy; 2025 - {{ now()->year }} {{ __('ui.all_rights_reserved') }}</p>
                <p class="mb-0">🔥 Powered by Takohr • il Forgiatore di Codice ⚒️</p>
            </div>

            {{-- Link legali e lingua --}}
            <div class="text-center mt-3">
                <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-2 small">
                    <a href="{{ route('privacy') }}" class="text-light" title="Privacy Policy">
                        {{ __('ui.privacy_policy') }}
                    </a>
                    <span class="d-none d-md-inline">|</span>
                    <a href="{{ route('cookie') }}" class="text-light" title="Cookie Policy">
                        {{ __('ui.cookie_policy') }}
                    </a>
                    <span class="d-none d-md-inline">|</span>
                    <a href="#" id="open-cookie-settings" class="text-light" title="Modifica preferenze cookie">
                        {{ __('ui.change_cookie_settings') }}
                    </a>
                </div>
            </div>


            {{-- Selettore lingua minimal --}}
            <div class="text-center mt-3">
                <form action="{{ route('locale.set') }}" method="POST" class="d-inline">
                    @csrf
                    <select name="locale" onchange="this.form.submit()"
                        class="form-select form-select-sm d-inline-block w-auto bg-dark text-light border-secondary">
                        <option value="it" @selected(app()->getLocale() === 'it')>IT</option>
                        <option value="en" @selected(app()->getLocale() === 'en')>EN</option>
                        <option value="fr" @selected(app()->getLocale() === 'fr')>FR</option>
                        <option value="de" @selected(app()->getLocale() === 'de')>DE</option>
                        <option value="es" @selected(app()->getLocale() === 'es')>ES</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</footer>
