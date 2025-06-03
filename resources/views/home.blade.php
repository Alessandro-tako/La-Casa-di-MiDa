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

    <!-- Sezione Camere -->
    <section class="py-5 bg-white" aria-labelledby="roomsSection">
        <div class="container text-center">
            <h2 id="roomsSection" class="text-gold mb-4">{{ __('ui.our_rooms') }}</h2>
            <p class="text-muted mb-5">{{ __('ui.our_rooms_subtitle') }}</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <article class="card h-100 shadow border-0">
                        <img src="{{ asset('storage/images/green-room/green1.jpg') }}" class="card-img-top"
                            alt="Camera Green Room con arredi naturali a Roma">
                        <div class="card-body">
                            <h3 class="card-title text-gold h5">{{ __('ui.green_room') }}</h3>
                            <p class="card-text text-muted">{{ __('ui.green_room_desc') }}</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="card h-100 shadow border-0">
                        <img src="{{ asset('storage/images/pink-room/pink1.jpg') }}" class="card-img-top"
                            alt="Camera Pink Room romantica e luminosa a Roma">
                        <div class="card-body">
                            <h3 class="card-title text-gold h5">{{ __('ui.pink_room') }}</h3>
                            <p class="card-text text-muted">{{ __('ui.pink_room_desc') }}</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="card h-100 shadow border-0">
                        <img src="{{ asset('storage/images/gray-room/gray4.jpg') }}" class="card-img-top"
                            alt="Camera Gray Room moderna e accogliente a Roma">
                        <div class="card-body">
                            <h3 class="card-title text-gold h5">{{ __('ui.gray_room') }}</h3>
                            <p class="card-text text-muted">{{ __('ui.gray_room_desc') }}</p>
                        </div>
                    </article>
                </div>
            </div>
            <a href="{{ route('camere.index') }}" class="btn btn-gold mt-4" title="{{ __('ui.discover_all_rooms') }}">
                {{ __('ui.discover_all_rooms') }}
            </a>
        </div>
    </section>

    <!-- Servizi -->
    <section class="bg-light py-5 text-center" aria-labelledby="servicesSection">
        <div class="container">
            <h2 id="servicesSection" class="text-gold mb-3">{{ __('ui.comfort_home_title') }}</h2>
            <p class="text-muted mb-5">{{ __('ui.comfort_home_desc') }}</p>
            <div class="row row-cols-2 row-cols-md-3 g-4">
                @foreach([
                    ['wifi-icon.png', 'wifi'],
                    ['assistenza-icon.png', 'assistance'],
                    ['caffe-icon.png', 'coffee'],
                    ['pulizia-icon.png', 'cleaning'],
                    ['trasferimenti-icon.png', 'transfers'],
                    ['vasca-doccia-icon.png', 'private_bathroom'],
                ] as [$icon, $label])
                    <div class="col">
                        <img src="{{ asset("storage/icons/$icon") }}" alt="{{ __('ui.'.$label) }}" width="64" height="64" loading="lazy">
                        <p class="mt-2">{{ __('ui.'.$label) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Cosa fare a Roma -->
    <section class="container my-5" aria-labelledby="discoverRomeSection">
        <div class="row justify-content-center text-center">
            <h2 id="discoverRomeSection" class="text-gold">{{ __('ui.discover_eternal_city') }}</h2>
            <p class="text-muted">{{ __('ui.rome_section_subtitle') }}</p>
            <div class="col-md-10 col-lg-8 position-relative">
                <a href="{{ route('cosaFare') }}" class="d-block text-decoration-none position-relative" title="{{ __('ui.just_steps_from_center_title') }}">
                    <img src="{{ asset('storage/images/cosa-fare-roma.png') }}" alt="Roma storica vista panoramica"
                        class="img-fluid rounded shadow w-100" style="object-fit: cover; max-height: 500px;" loading="lazy">

                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded"
                        style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>

                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3"
                        style="z-index: 2;">
                        <h3 class="h4 fw-bold text-gold">{{ __('ui.just_steps_from_center_title') }}</h3>
                        <p class="lead">{{ __('ui.just_steps_from_center_subtitle') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
</x-layout>
