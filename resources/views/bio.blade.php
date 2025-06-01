<x-layout>
    <section class="container py-5">
        <!-- Hero -->
        <header class="text-center mb-5">
            <div class="text-center mb-5">
                <h1 class="text-gold display-5">Chi Siamo</h1>
                <p class="lead text-muted">Accoglienza autentica, passione familiare e comfort moderni nel cuore di Roma
                </p>
            </div>
        </header>

        <!-- Info sull'azienda -->
        <div class="row mb-5 align-items-center">
            <h2 class="h4 text-gold"><i class="bi bi-house-heart-fill me-2"></i>La Nostra Storia</h2>
            <p class="text-muted">
                La <strong>Casa di MiDa</strong> è una nuova realtà nata nel 2025 dall’entusiasmo di due fratelli,
                <strong>Damiano e Michela</strong>.
                Il nostro sogno è offrire un’esperienza unica di <strong>ospitalità familiare a Roma</strong>, dove
                ogni ospite si senta accolto come a casa.
            </p>
            <p class="text-muted">
                Essendo la nostra prima <strong>struttura ricettiva</strong>, dedichiamo il massimo impegno per
                garantire soggiorni piacevoli, autentici e curati nei minimi dettagli.
                La nostra energia e la voglia di crescere sono il cuore pulsante di questa nuova avventura.
            </p>
        </div>

        <!-- Info sulla struttura -->
        <div class="row mb-5 align-items-center">
            <h2 class="h4 text-gold"><i class="bi bi-door-open-fill me-2"></i>La Struttura</h2>
            <p class="text-muted">
                La nostra <strong>struttura ricettiva nel centro di Roma</strong> è stata completamente rinnovata
                per offrire ambienti moderni, eleganti e funzionali.
                Ogni camera è progettata per garantire il massimo del <strong>comfort e relax</strong>.
            </p>
            <p class="text-muted">
                Tra i servizi inclusi: <strong>aria condizionata</strong>, <strong>Wi-Fi gratuito</strong>,
                <strong>TV Smart 50 pollici</strong>, <strong>cassaforte</strong>,
                <strong>bagno privato con bidet</strong>, set cortesia, e biancheria di alta qualità.
                La struttura dispone anche di un’accogliente <strong>area comune con cucina</strong>, perfetta per
                socializzare o gustare un buon caffè.
            </p>
        </div>

        <!-- Galleria fotografica -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center">
                <h2 class="text-gold mb-4">Galleria della struttura</h2>
                <div class="mb-4">
                    <img id="mainStrutturaImage" src="{{ asset('storage/images/struttura/struttura1.jpg') }}"
                        class="main-image shadow" alt="Foto principale struttura">
                </div>
                <div class="d-flex justify-content-center gap-2 flex-wrap" id="strutturaThumbnails">
                    @for ($i = 1; $i <= 11; $i++)
                        <img src="{{ asset('storage/images/struttura/struttura' . $i . '.jpg') }}"
                            class="img-thumb shadow-sm {{ $i === 1 ? 'active-thumb' : '' }}"
                            alt="Miniatura struttura {{ $i }}">
                    @endfor
                </div>
            </div>
        </div>

        <!-- Quartiere -->
        <article class="mb-5">
            <h2 class="h4 text-gold">Il quartiere Esquilino</h2>
            <p class="text-muted">
                Situato nel cuore di Roma, l'Esquilino è uno dei rioni più storici e vivaci della città. Con la Stazione
                Termini a pochi passi, è perfetto per chi desidera esplorare Roma a piedi. Tra le attrazioni principali
                nelle vicinanze: la Basilica di Santa Maria Maggiore, il Colosseo, i Fori Imperiali e molto altro.
            </p>
        </article>

        <!-- Dintorni della struttura -->
        <article class="mb-5">
            <h2 class="h4 text-gold">Nei dintorni</h2>
            <ul class="list-unstyled row row-cols-1 row-cols-md-2 g-3 text-muted">
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Santa Teresa – 150 m</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Piazza della Repubblica – 900 m</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Domus Aurea – 1,2 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Colosseo – 1,5 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Fontana di Trevi – 1,9 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Piazza di Spagna – 2,2 km</li>
            </ul>
        </article>

        <!-- Servizi disponibili -->
        <article class="mb-5">
            <h2 class="h4 text-gold">Servizi disponibili</h2>

            <h5 class="text-gold mt-4"><i class="bi bi-star-fill me-2"></i>I più apprezzati</h5>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>WiFi gratuito in tutta la struttura</div>
                <div>Aria condizionata in tutte le camere</div>
                <div>TV a schermo piatto con canali via cavo</div>
                <div>Camere non fumatori</div>
                <div>Ascensore</div>
                <div>Servizio di pulizia giornaliero</div>
                <div>Bollitore tè/macchina da caffè in ogni camera</div>
            </div>

            <h5 class="text-gold mt-4"><i class="bi bi-houses"></i> Comfort in camera</h5>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>Bagno privato con doccia, bidet e WC</div>
                <div>Prodotti da bagno in omaggio</div>
                <div>Asciugacapelli</div>
                <div>Carta igienica e asciugamani</div>
                <div>Biancheria da letto</div>
                <div>Armadio o guardaroba</div>
                <div>Cassaforte</div>
                <div>Presa elettrica vicino al letto</div>
                <div>Stand appendiabiti</div>
                <div>Scrivania</div>
            </div>

            <h5 class="text-gold mt-4"><i class="bi bi-cup-hot me-2"></i>Cucina e zona comune</h5>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>Cucina in comune</div>
                <div>Bollitore elettrico</div>
                <div>Macchina da caffè</div>
                <div>Sala comune con zona TV</div>
                <div>Frigorifero</div>
            </div>

            <h5 class="text-gold mt-4"><i class="bi bi-shield-lock-fill me-2"></i>Servizi generali e sicurezza</h5>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>Sistema antifumo e rilevatore CO</div>
                <div>Videosorveglianza nelle aree comuni</div>
                <div>Allarme antincendio</div>
                <div>Fattura disponibile su richiesta</div>
                <div>Check-in e check-out privati</div>
                <div>Riscaldamento</div>
                <div>Struttura interamente non fumatori</div>
                <div>Camere anallergiche</div>
                <div>Pavimento in marmo o piastrelle</div>
            </div>

            <h5 class="text-gold mt-4"><i class="bi bi-universal-access me-2"></i>Accessibilità e lingue parlate</h5>
            <div class="row row-cols-1 row-cols-md-2 g-3 text-muted">
                <div>Italiano e inglese parlati</div>
            </div>
        </article>

    </section>
</x-layout>
