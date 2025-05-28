<x-layout>
    <!-- Header -->
    <section class="container py-5">
        <div class="text-center">
            <h1 class="text-gold mb-3">Contattaci</h1>
            <p class="text-muted">Hai domande, richieste speciali o vuoi semplicemente metterti in contatto con noi?
                Siamo qui per aiutarti.</p>
        </div>
    </section>

    <!-- Info contatti e mappa -->
    <section class="container mb-5">
        <div class="row align-items-center g-5">
            <!-- Dati di contatto -->
            <div class="col-md-6">
                <h3 class="text-gold mb-4">I nostri recapiti</h3>
                <ul class="list-unstyled text-muted">
                    <li class="mb-3">
                        <i class="bi bi-geo-alt-fill me-2 text-gold"></i>
                        <strong>Indirizzo:</strong> Via Carlo Cattaneo 10, Roma (RM)
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-envelope-fill me-2 text-gold"></i>
                        <strong>Email:</strong> <a href="mailto:info@lacasadimida.it"
                            class="text-decoration-none link-dark">info@lacasadimida.it</a>
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-phone-fill me-2 text-gold"></i>
                        <strong>Telefono:</strong> <a href="tel:+390612345678"
                            class="text-decoration-none link-dark">+39 06 12345678</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-gold rounded-pill mt-3">Prenota Ora</a>
            </div>

            <!-- Mappa -->
            <div class="col-md-6">
                <div class="ratio ratio-4x3 rounded shadow">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.050063758504!2d12.50175421541894!3d41.897211779220376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f61b6b2c6e5d1%3A0xabb79de28f2332f1!2sVia%20Carlo%20Cattaneo%2C%2010%2C%2000185%20Roma%20RM!5e0!3m2!1sit!2sit!4v1716900000000"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Livewire -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center text-gold mb-4">Scrivici un messaggio</h2>
            <p class="text-center text-muted mb-5">Compila il form per inviarci direttamente una richiesta o domanda. Ti
                risponderemo il prima possibile!</p>

            <livewire:contatti-form />
        </div>
    </section>
</x-layout>
