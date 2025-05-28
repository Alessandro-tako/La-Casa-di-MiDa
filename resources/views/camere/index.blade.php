<x-layout>
    <section class="container py-5">

        {{-- Titolo sezione camere --}}
        <div class="text-center mb-5">
            <h1 class="text-gold">Le nostre camere</h1>
            <p class="text-muted">Tre ambienti esclusivi per offrirti il massimo comfort durante il tuo soggiorno a
                Roma.</p>
        </div>

        {{-- Green Room --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div id="carouselGreen" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/images/green-room/green1.jpg') }}" class="d-block w-100 rounded"
                                alt="Green Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/green-room/green2.jpg') }}" class="d-block w-100 rounded"
                                alt="Green Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/green-room/green3.jpg') }}" class="d-block w-100 rounded"
                                alt="Green Room">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGreen"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGreen"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-gold">Green Room</h2>
                <p class="text-muted">
                    Elegante e ispirata alla natura, la Green Room offre flessibilità nei letti e un ambiente
                    rilassante, perfetto per famiglie o piccoli gruppi.
                </p>

                <a href="{{ route('camere.green') }}" class="btn btn-gold mt-3 rounded-pill">Scopri di più</a>
            </div>
        </div>

        {{-- Pink Room --}}
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <div id="carouselPink" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/images/pink-room/pink1.jpg') }}" class="d-block w-100 rounded"
                                alt="Pink Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/pink-room/pink2.jpg') }}" class="d-block w-100 rounded"
                                alt="Pink Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/pink-room/pink3.jpg') }}" class="d-block w-100 rounded"
                                alt="Pink Room">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPink"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPink"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-gold">Pink Room</h2>
                <p class="text-muted">
                    Intima e raffinata, la Pink Room avvolge gli ospiti in un’atmosfera romantica e luminosa, ideale per
                    coppie in cerca di relax.
                </p>

                <a href="{{ route('camere.pink') }}" class="btn btn-gold mt-3 rounded-pill">Scopri di più</a>
            </div>
        </div>

        {{-- Gray Room --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div id="carouselGray" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/images/gray-room/gray1.jpg') }}" class="d-block w-100 rounded"
                                alt="Gray Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/gray-room/gray2.jpg') }}" class="d-block w-100 rounded"
                                alt="Gray Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/gray-room/gray3.jpg') }}" class="d-block w-100 rounded"
                                alt="Gray Room">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGray"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGray"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-gold">Gray Room</h2>
                <p class="text-muted">
                    Moderna e luminosa, la Gray Room unisce design e comfort, con letti flessibili e una parete
                    decorativa che crea un’atmosfera accogliente.
                </p>
                <a href="{{ route('camere.grey') }}" class="btn btn-gold mt-3 rounded-pill">Scopri di più</a>
            </div>
        </div>

        {{-- Sezione struttura con anteprime dinamiche --}}
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center">
                <h2 class="text-gold mb-4">La Struttura</h2>
                <p class="text-muted">
                    Scopri i dettagli della nostra struttura: ambienti accoglienti, spazi curati e una zona comune dove
                    puoi sorseggiare un caffè, leggere un libro o condividere momenti piacevoli con gli altri ospiti.
                </p>

                {{-- Immagine principale --}}
                <div class="mb-4">
                    <img id="mainStrutturaImage" src="{{ asset('storage/images/struttura/struttura1.jpg') }}"
                        class="main-image shadow" alt="Foto principale struttura">
                </div>

                {{-- Miniature dinamiche --}}
                <div class="d-flex justify-content-center gap-2 flex-wrap" id="strutturaThumbnails">
                    @for ($i = 1; $i <= 11; $i++)
                        <img src="{{ asset('storage/images/struttura/struttura' . $i . '.jpg') }}"
                            class="img-thumb shadow-sm {{ $i === 1 ? 'active-thumb' : '' }}"
                            alt="Miniatura struttura {{ $i }}">
                    @endfor
                </div>
            </div>
        </div>

    </section>

    {{-- JS per selezione thumbnail attiva --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('#strutturaThumbnails .img-thumb');
            const mainImage = document.getElementById('mainStrutturaImage');

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    mainImage.src = this.src;
                    thumbnails.forEach(t => t.classList.remove('active-thumb'));
                    this.classList.add('active-thumb');
                });
            });
        });
    </script>
</x-layout>
