<x-layout>
    <section class="container py-5">
        {{-- Intestazione con immagine di Roma --}}
        <header class="position-relative mb-5" data-aos="fade-zoom-in">
            <img src="{{ asset('storage/images/roma-header.png') }}" alt="Vista panoramica di Roma al tramonto"
                class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4);"></div>
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="display-5 fw-bold text-gold">{{ __('ui.discover_rome_title') }}</h1>
                <p class="lead">{{ __('ui.discover_rome_subtitle') }}</p>
            </div>
        </header>

        {{-- Introduzione alla sezione turistica --}}
        <article class="mb-5" data-aos="fade-up">
            <header>
                <h2 class="h2 text-gold">{{ __('ui.rome_intro_title') }}</h2>
            </header>
            <p class="text-muted">{!! __('ui.rome_intro_text') !!}</p>
        </article>

        {{-- Luoghi di interesse turistico --}}
        @foreach ($luoghi as $index => $luogo)
            <section class="row align-items-center mb-5 flex-md-row {{ $index % 2 === 0 ? '' : 'flex-md-row-reverse' }}"
                data-aos="{{ $index % 2 === 0 ? 'fade-right' : 'fade-left' }}" data-aos-delay="{{ 100 * $index }}">

                {{-- Testo prima su mobile, secondo su desktop --}}
                <div class="col-md-6 order-1 order-md-2">
                    <h3 class="h5 text-gold">{{ __('ui.places.' . $luogo['key'] . '.title') }}</h3>
                    <p class="text-muted">{!! __('ui.places.' . $luogo['key'] . '.text') !!}</p>
                </div>

                {{-- Immagine dopo su mobile, prima su desktop --}}
                <div class="col-md-6 order-2 order-md-1 mb-3 mb-md-0">
                    <figure>
                        <img src="{{ asset('storage/images/' . $luogo['image']) }}"
                            alt="{{ __('ui.places.' . $luogo['key'] . '.title') }} - luogo turistico a Roma"
                            class="img-fluid rounded shadow mb-2">
                        @if (isset($luogo['credit']))
                            <figcaption class="text-muted small fst-italic">{!! $luogo['credit'] !!}</figcaption>
                        @endif
                    </figure>
                </div>

            </section>
        @endforeach

        {{-- Chiusura e call-to-action --}}
        <footer class="mt-5 text-center bg-white" data-aos="fade-up">
            <p class="fs-5 fst-italic text-muted">{!! __('ui.rome_outro_text') !!}</p>
            <a href="{{ route('camere.index') }}" class="btn btn-gold rounded-pill mt-3">
                {{ __('ui.discover_our_rooms') }}
            </a>
        </footer>
    </section>
</x-layout>
