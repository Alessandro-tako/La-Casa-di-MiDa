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
                <h5 class="fw-bold font-serif mb-3 text-gold">Contatti</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        Via Carlo Cattaneo 10, Roma (RM)
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope-fill me-2"></i>
                        <a href="mailto:info@lacasadimida.it"
                            class="link-light text-decoration-none">info@lacasadimida.it</a>
                    </li>
                    <li>
                        <i class="bi bi-phone-fill me-2"></i>
                        <a href="tel:+390612345678" class="link-light text-decoration-none">+39 06 12345678</a>
                    </li>
                </ul>
            </div>

            {{-- Link utili --}}
            <div class="col-12 col-md-3 text-center text-md-start">
                <h5 class="fw-bold font-serif mb-3 text-gold">Link utili</h5>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}" class="link-light text-decoration-none">Home</a></li>
                    <li><a href="{{ route('camere.index') }}" class="link-light text-decoration-none">Camere</a></li>
                    <li><a href="{{ route('cosaFare') }}" class="link-light text-decoration-none">Cosa fare a Roma</a>
                    </li>
                    <li><a href="{{ route('contatti') }}" class="link-light text-decoration-none">Contatti</a></li>
                </ul>
            </div>
            {{-- Social --}}
            <div class="col-12 col-md-3 text-center text-md-start">
                <h5 class="fw-bold font-serif mb-3 text-gold">Seguici</h5>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a href="https://www.instagram.com/la_casa_di_mida/" target="_blank" rel="noopener"
                        class="text-light fs-4 me-2" title="Instagram La Casa di MiDa">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>


            <hr class="border-secondary my-4">

            <div class="text-center small">
                <p class="mb-1">La Casa di MiDa - P.IVA: 01234567890</p>
                <p class="mb-1">&copy; 2025 - {{ now()->year }} Tutti i diritti riservati.</p>
                <p class="mb-0">🔥 Powered by Takohr • il Forgiatore di Codice ⚒️</p>
            </div>

            {{-- Iubenda --}}
            <div class="text-center mt-3">
                <a href="https://www.iubenda.com/privacy-policy/12345678"
                    class="iubenda-black iubenda-noiframe iubenda-embed" title="Privacy Policy">Privacy Policy</a> |
                <a href="https://www.iubenda.com/privacy-policy/12345678/cookie-policy"
                    class="iubenda-black iubenda-noiframe iubenda-embed" title="Cookie Policy">Cookie Policy</a>
            </div>
        </div>
</footer>
