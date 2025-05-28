<footer class="bg-black text-light pt-5 pb-4 mt-5 border-top border-secondary" role="contentinfo">
    <div class="container">

        {{-- Logo centrale --}}
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/loghi/logo-nero-oro.jpg') }}" alt="Logo La Casa di MiDa" style="max-width: 100px;">
        </div>

        <div class="row g-4 justify-content-between">

            {{-- Contatti --}}
            <div class="col-12 col-md-4 text-center text-md-start">
                <h5 class="fw-bold font-serif mb-3 text-gold">Contatti</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        Via Cavour 123, Roma (RM)
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
                    <li><a href="#" class="link-light text-decoration-none">Home</a></li>
                    <li><a href="#" class="link-light text-decoration-none">Camere</a></li>
                    <li><a href="#" class="link-light text-decoration-none">Cosa Fare a
                            Roma</a></li>
                    <li><a href="#" class="link-light text-decoration-none">Contatti</a></li>
                </ul>
            </div>

            {{-- Social --}}
            <div class="col-12 col-md-3 text-center text-md-start">
                <h5 class="fw-bold font-serif mb-3 text-gold">Seguici</h5>
                <a href="https://www.instagram.com/lacasadimida/" target="_blank" rel="noopener"
                    class="text-light fs-4 me-3">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://www.facebook.com/lacasadimida" target="_blank" rel="noopener" class="text-light fs-4">
                    <i class="bi bi-facebook"></i>
                </a>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="text-center small">
            <p class="mb-1">La Casa di MiDa - P.IVA: 01234567890</p>
            <p class="mb-1">&copy; 2024 - {{ now()->year }} Tutti i diritti riservati.</p>
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
