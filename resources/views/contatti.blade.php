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

    <!-- Come raggiungerci -->
    <section class="container py-5">
        <h2 class="text-center text-gold mb-4">Come raggiungerci</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="text-muted">
                    <strong>🚗 In auto:</strong> La Casa di MiDa si trova in <strong>Via Carlo Cattaneo 10</strong>, nel
                    quartiere Esquilino, a pochi minuti dalla Stazione Termini. La zona è accessibile in auto e dispone
                    di parcheggi a pagamento nei dintorni. Si consiglia di verificare eventuali restrizioni del traffico
                    (ZTL) attive nel centro di Roma.
                </p>

                <p class="text-muted">
                    <strong>🚆 Con i mezzi pubblici:</strong> La struttura è ben collegata con il resto della città:
                </p>
                <ul class="text-muted">
                    <li><strong>Metro:</strong> Linea A – fermata <em>Vittorio Emanuele</em> (3 minuti a piedi)</li>
                    <li><strong>Treno:</strong> Stazione <em>Roma Termini</em> (7 minuti a piedi)</li>
                    <li><strong>Autobus:</strong> Linee 105, 150F, 360, 590, 70, 714 – fermate: Carlo Alberto, Gioberti,
                        S. Maria Maggiore</li>
                    <li><strong>Tram:</strong> Linee 5 e 14 – fermate nelle vicinanze</li>
                </ul>

                <p class="text-muted">
                    Puoi pianificare il tuo percorso utilizzando l'app <a
                        href="https://moovitapp.com/index/it/mezzi_pubblici-Via_Carlo_Cattaneo-Roma_e_Lazio-street_10640354-61"
                        target="_blank" class="text-gold text-decoration-underline">Moovit</a> o consultando il sito
                    ufficiale di ATAC Roma.
                </p>
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
