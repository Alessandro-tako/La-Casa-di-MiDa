<x-layout>
        <!-- Hero -->
        <header class="text-center py-5 bg-white">
            <div class="container">
                <h1 class="display-4 text-gold">Nel Cuore di Roma</h1>
                <p class="lead text-muted px-3">Il tuo rifugio nel cuore di Roma. Eleganza, comfort e accoglienza a due passi
                    dal centro storico.</p>
                <a href="#" class="btn btn-gold rounded-pill px-4"
                    title="Prenota ora la tua camera">Prenota Ora</a>
            </div>
        </header>

        <!-- Sezione Info - Carosello -->
        <section class="container text-center my-5">
            <div id="carouselCamere" class="carousel slide shadow rounded" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/images/gray-room/gray1.jpg') }}" class="d-block w-100 h-100 rounded"
                            alt="Camera Gray Room elegante e moderna">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/images/green-room/green4.jpg') }}" class="d-block w-100 rounded"
                            alt="Camera Green Room con vista">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/images/pink-room/pink3.jpg') }}" class="d-block w-100 rounded"
                            alt="Camera Pink Room romantica">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCamere" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Precedente</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselCamere" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Successiva</span>
                </button>
            </div>
        </section>

        <!-- Sezione "Cosa fare a Roma" -->
        <section class="container my-5 text-center">
            <h2 class="text-gold mb-4">Scopri la Città Eterna</h2>
            <p class="text-muted">Passeggia tra le meraviglie storiche di Roma a pochi minuti dalla nostra struttura.</p>
            <a href="{{route('cosaFare')}}" title="Cosa fare a Roma - Itinerari e attrazioni">
                <img src="{{ asset('storage/images/cosa-fare-roma.png') }}" class="img-fluid rounded shadow"
                    alt="Colosseo e centro storico di Roma">
            </a>
        </section>

        <!-- Anteprima Camere -->
        <section class="py-5 bg-white">
            <div class="container text-center">
                <h2 class="text-gold mb-4">Le nostre camere</h2>
                <p class="text-muted mb-5">Scegli tra tre ambienti unici, ognuno con stile e comfort esclusivi.</p>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 shadow border-0">
                            <img src="{{ asset('storage/images/green-room/green1.jpg') }}" class="card-img-top"
                                alt="Green Room con design naturale">
                            <div class="card-body">
                                <h5 class="card-title text-gold">Green Room</h5>
                                <p class="card-text text-muted">Eleganza naturale con dettagli raffinati ispirati alla
                                    natura.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow border-0">
                            <img src="{{ asset('storage/images/pink-room/pink1.jpg') }}" class="card-img-top"
                                alt="Pink Room per soggiorni romantici">
                            <div class="card-body">
                                <h5 class="card-title text-gold">Pink Room</h5>
                                <p class="card-text text-muted">Atmosfera romantica con tonalità delicate e comfort moderni.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow border-0">
                            <img src="{{ asset('storage/images/gray-room/gray4.jpg') }}" class="card-img-top"
                                alt="Gray Room elegante e sofisticata">
                            <div class="card-body">
                                <h5 class="card-title text-gold">Gray Room</h5>
                                <p class="card-text text-muted">Design moderno e sofisticato, perfetta per un soggiorno
                                    rilassante.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('camere.index')}}" class="btn btn-gold mt-4"
                    title="Scopri tutte le camere disponibili">Scopri tutte le camere</a>
            </div>
        </section>

        <!-- Servizi -->
        <section class="bg-light py-5 text-center">
            <div class="container">
                <h2 class="text-gold mb-3">Tutti i comfort per sentirti a casa</h2>
                <p class="text-muted mb-5">Servizi pensati per offrirti un soggiorno senza pensieri</p>
                <div class="row row-cols-2 row-cols-md-3 g-4">
                    <div class="col">
                        <img src="{{ asset('storage/icons/wifi-icon.png') }}" alt="Wi-Fi gratuito" width="64"
                            height="64">
                        <p>Wi-Fi gratuito</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('storage/icons/assistenza-icon.png') }}" alt="Assistenza personalizzata"
                            width="64" height="64">
                        <p>Assistenza personalizzata</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('storage/icons/caffe-icon.png') }}" alt="Caffè in area comune" width="64"
                            height="64">
                        <p>Caffè in area comune</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('storage/icons/pulizia-icon.png') }}" alt="Pulizia giornaliera" width="64"
                            height="64">
                        <p>Pulizia giornaliera</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('storage/icons/trasferimenti-icon.png') }}" alt="Trasferimenti su richiesta"
                            width="64" height="64">
                        <p>Trasferimenti su richiesta</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('storage/icons/vasca-doccia-icon.png') }}" alt="Bagno privato in ogni camera"
                            width="64" height="64">
                        <p>Bagno privato in ogni camera</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- WhatsApp e Lingua -->
        <div class="position-fixed bottom-0 start-0 m-3 z-3">
            <div class="bg-white px-3 py-2 rounded shadow-sm border">
                IT <span class="dropdown-toggle"></span>
            </div>
        </div>

        <div class="position-fixed bottom-0 end-0 m-3 z-3">
            <a href="https://wa.me/393000000000" class="btn btn-success btn-lg rounded-circle shadow">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </x-layout>
