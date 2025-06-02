<x-layout>
    <!-- Hero -->
    <header class="text-center py-5 bg-white">
        <div class="container">
            <h1 class="display-4 text-gold">{{ __('ui.in_the_heart_of_rome') }}</h1>
            <p class="lead text-muted px-3">{{ __('ui.hero_subtitle') }}</p>
            <a href="#booking" class="btn btn-gold rounded-pill px-4" title="{{ __('ui.book_now') }}">
                {{ __('ui.book_now') }}
            </a>
        </div>
    </header>

    <!-- Carosello -->
    {{-- <section class="container text-center my-5">
        <div id="carouselCamere" class="carousel slide shadow rounded" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/images/gray-room/gray1.jpg') }}" class="d-block w-100 h-100 rounded"
                        alt="Gray Room">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/green-room/green4.jpg') }}" class="d-block w-100 rounded"
                        alt="Green Room">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/pink-room/pink3.jpg') }}" class="d-block w-100 rounded"
                        alt="Pink Room">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCamere" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselCamere" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section> --}}

    <!-- Camere -->
    <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="text-gold mb-4">{{ __('ui.our_rooms') }}</h2>
            <p class="text-muted mb-5">{{ __('ui.our_rooms_subtitle') }}</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100 shadow border-0">
                        <img src="{{ asset('storage/images/green-room/green1.jpg') }}" class="card-img-top"
                            alt="Green Room">
                        <div class="card-body">
                            <h5 class="card-title text-gold">{{ __('ui.green_room') }}</h5>
                            <p class="card-text text-muted">{{ __('ui.green_room_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow border-0">
                        <img src="{{ asset('storage/images/pink-room/pink1.jpg') }}" class="card-img-top"
                            alt="Pink Room">
                        <div class="card-body">
                            <h5 class="card-title text-gold">{{ __('ui.pink_room') }}</h5>
                            <p class="card-text text-muted">{{ __('ui.pink_room_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow border-0">
                        <img src="{{ asset('storage/images/gray-room/gray4.jpg') }}" class="card-img-top"
                            alt="Gray Room">
                        <div class="card-body">
                            <h5 class="card-title text-gold">{{ __('ui.gray_room') }}</h5>
                            <p class="card-text text-muted">{{ __('ui.gray_room_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('camere.index') }}" class="btn btn-gold mt-4" title="{{ __('ui.discover_all_rooms') }}">
                {{ __('ui.discover_all_rooms') }}
            </a>
        </div>
    </section>

    <!-- Servizi -->
    <section class="bg-light py-5 text-center">
        <div class="container">
            <h2 class="text-gold mb-3">{{ __('ui.comfort_home_title') }}</h2>
            <p class="text-muted mb-5">{{ __('ui.comfort_home_desc') }}</p>
            <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="col">
                    <img src="{{ asset('storage/icons/wifi-icon.png') }}" alt="Wi-Fi" width="64" height="64">
                    <p>{{ __('ui.wifi') }}</p>
                </div>
                <div class="col">
                    <img src="{{ asset('storage/icons/assistenza-icon.png') }}" alt="Assistenza" width="64"
                        height="64">
                    <p>{{ __('ui.assistance') }}</p>
                </div>
                <div class="col">
                    <img src="{{ asset('storage/icons/caffe-icon.png') }}" alt="Caffè" width="64"
                        height="64">
                    <p>{{ __('ui.coffee') }}</p>
                </div>
                <div class="col">
                    <img src="{{ asset('storage/icons/pulizia-icon.png') }}" alt="Pulizia" width="64"
                        height="64">
                    <p>{{ __('ui.cleaning') }}</p>
                </div>
                <div class="col">
                    <img src="{{ asset('storage/icons/trasferimenti-icon.png') }}" alt="Trasferimenti" width="64"
                        height="64">
                    <p>{{ __('ui.transfers') }}</p>
                </div>
                <div class="col">
                    <img src="{{ asset('storage/icons/vasca-doccia-icon.png') }}" alt="Bagno privato" width="64"
                        height="64">
                    <p>{{ __('ui.private_bathroom') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Scopri Roma -->
    <section class="container my-5">
        <div class="row justify-content-center text-center">
            <h2>{{ __('ui.discover_eternal_city') }}</h2>
            <p>{{ __('ui.rome_section_subtitle') }}</p>
            {{-- Colonna centrale con immagine cliccabile e testi --}}
            <div class="col-md-10 col-lg-8 position-relative">
                <a href="{{ route('cosaFare') }}" class="d-block text-decoration-none position-relative">
                    {{-- Immagine --}}
                    <img src="{{ asset('storage/images/cosa-fare-roma.png') }}" alt="Panorama di Roma"
                        class="img-fluid rounded shadow w-100" style="object-fit: cover; max-height: 500px;">

                    {{-- Overlay --}}
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded"
                        style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>

                    {{-- Testo centrato sopra l'immagine --}}
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3"
                        style="z-index: 2;">
                        <h3>{{ __('ui.just_steps_from_center_title') }}</h3>
                        <p>{{ __('ui.just_steps_from_center_subtitle') }}</p>

                    </div>
                </a>
            </div>
        </div>
    </section>

</x-layout>
