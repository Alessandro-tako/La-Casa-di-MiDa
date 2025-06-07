<x-layout>
    <section class="container py-5">
        {{-- Titolo sezione camere --}}
        <header class="text-center mb-5" data-aos="fade-zoom-in">
            <h1 class="text-gold">{{ __('ui.our_rooms') }}</h1>
            <p class="text-muted">{{ __('ui.our_rooms_subtitle') }}</p>
        </header>

        {{-- Green Room --}}
        <div class="row align-items-center mb-5" data-aos="fade-up">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                <div id="carouselGreen" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                <img src="{{ asset("storage/images/green-room/green{$i}.jpg") }}"
                                    class="d-block w-100 rounded" alt="Foto Green Room {{ $i }}">
                            </div>
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGreen"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGreen"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successivo</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                <h2 class="text-gold h3">{{ __('ui.green_room') }}</h2>
                <p class="text-muted">{{ __('ui.green_room_desc') }}</p>
                <a href="{{ route('camere.green') }}" class="btn btn-gold mt-3 rounded-pill"
                    title="{{ __('ui.green_room') }}">
                    {{ __('ui.learn_more') }}
                </a>
            </div>
        </div>

        {{-- Pink Room --}}
        <div class="row align-items-center mb-5 flex-md-row-reverse" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                <div id="carouselPink" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                <img src="{{ asset("storage/images/pink-room/pink{$i}.jpg") }}"
                                    class="d-block w-100 rounded" alt="Foto Pink Room {{ $i }}">
                            </div>
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPink"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPink"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successivo</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                <h2 class="text-gold h3">{{ __('ui.pink_room') }}</h2>
                <p class="text-muted">{{ __('ui.pink_room_desc') }}</p>
                <a href="{{ route('camere.pink') }}" class="btn btn-gold mt-3 rounded-pill"
                    title="{{ __('ui.pink_room') }}">
                    {{ __('ui.learn_more') }}
                </a>
            </div>
        </div>

        {{-- Grey Room --}}
        <div class="row align-items-center mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                <div id="carouselGrey" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                <img src="{{ asset("storage/images/grey-room/grey{$i}.jpg") }}"
                                    class="d-block w-100 rounded" alt="Foto Grey Room {{ $i }}">
                            </div>
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGrey"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGrey"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successivo</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="400">
                <h2 class="text-gold h3">{{ __('ui.grey_room') }}</h2>
                <p class="text-muted">{{ __('ui.grey_room_desc') }}</p>
                <a href="{{ route('camere.grey') }}" class="btn btn-gold mt-3 rounded-pill"
                    title="{{ __('ui.grey_room') }}">
                    {{ __('ui.learn_more') }}
                </a>
            </div>
        </div>
    </section>
</x-layout>
