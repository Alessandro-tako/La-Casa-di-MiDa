<x-layout>
    <section class="container py-5">
        {{-- Titolo sezione camere --}}
        <div class="text-center mb-5">
            <h1 class="text-gold">{{ __('ui.our_rooms') }}</h1>
            <p class="text-muted">{{ __('ui.our_rooms_subtitle') }}</p>
        </div>

        {{-- Green Room --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div id="carouselGreen" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                <img src="{{ asset("storage/images/green-room/green{$i}.jpg") }}"
                                    class="d-block w-100 rounded" alt="Green Room {{ $i }}">
                            </div>
                        @endfor
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
                <h2 class="text-gold">{{ __('ui.green_room') }}</h2>
                <p class="text-muted">{{ __('ui.green_room_desc') }}</p>
                <a href="{{ route('camere.green') }}"
                    class="btn btn-gold mt-3 rounded-pill">{{ __('ui.learn_more') }}</a>
            </div>
        </div>

        {{-- Pink Room --}}
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <div id="carouselPink" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                <img src="{{ asset("storage/images/pink-room/pink{$i}.jpg") }}"
                                    class="d-block w-100 rounded" alt="Pink Room {{ $i }}">
                            </div>
                        @endfor
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
                <h2 class="text-gold">{{ __('ui.pink_room') }}</h2>
                <p class="text-muted">{{ __('ui.pink_room_desc') }}</p>
                <a href="{{ route('camere.pink') }}"
                    class="btn btn-gold mt-3 rounded-pill">{{ __('ui.learn_more') }}</a>
            </div>
        </div>

        {{-- Gray Room --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div id="carouselGray" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                <img src="{{ asset("storage/images/gray-room/gray{$i}.jpg") }}"
                                    class="d-block w-100 rounded" alt="Gray Room {{ $i }}">
                            </div>
                        @endfor
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
                <h2 class="text-gold">{{ __('ui.gray_room') }}</h2>
                <p class="text-muted">{{ __('ui.gray_room_desc') }}</p>
                <a href="{{ route('camere.grey') }}"
                    class="btn btn-gold mt-3 rounded-pill">{{ __('ui.learn_more') }}</a>
            </div>
        </div>
    </section>
</x-layout>
