<x-layout>
    <section class="container py-5">
        <header class="position-relative">
            {{-- Immagine di sfondo --}}
            <img src="{{ asset('storage/images/roma-header.png') }}" alt="Panorama di Roma" class="img-fluid w-100"
                style="max-height: 500px; object-fit: cover;">

            {{-- Overlay scuro --}}
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4);"></div>

            {{-- Testo centrato --}}
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="display-5 fw-bold text-gold">{{ __('ui.discover_rome_title') }}</h1>
                <p class="lead">{{ __('ui.discover_rome_subtitle') }}</p>
            </div>
        </header>

        <article class="mb-5">
            <h2 class="h4 text-gold">{{ __('ui.rome_intro_title') }}</h2>
            <p class="text-muted">{!! __('ui.rome_intro_text') !!}</p>
        </article>

        @php
            $luoghi = [
                [
                    'key' => 'santa_maria_maggiore',
                    'image' => 'santa-maria-maggiore.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nickcastelliphotography">Nick Castelli</a> su <a href="https://unsplash.com/it/foto/unauto-parcheggiata-davanti-a-un-grande-edificio-TQgKNmYmzyE">Unsplash</a>',
                ],
                [
                    'key' => 'colosseum',
                    'image' => 'colosseo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nicknight">Nick Night</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-sotto-il-cielo-bianco-durante-il-giorno-9tOrcg9tPyM">Unsplash</a>',
                ],
                [
                    'key' => 'fori_imperiali',
                    'image' => 'fori-imperiali.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nathanstaz">Nathan Staz</a> su <a href="https://unsplash.com/it/foto/le-rovine-dellantica-citta-di-roma-Vlh2VWXvrOc">Unsplash</a>',
                ],
                [
                    'key' => 'trevi_fountain',
                    'image' => 'fontana-di-trevi.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@ansharimages">Andrey Omelyanchuk</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-bianco-con-fontana-dacqua-VcWIMPXiGlU">Unsplash</a>',
                ],
                [
                    'key' => 'altare_patria',
                    'image' => 'altare-della-patria.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@yayamomt">Yahya Momtaz</a> su <a href="https://unsplash.com/it/foto/un-grande-edificio-bianco-con-una-statua-sopra-di-esso-bqxpi2Yj83Y">Unsplash</a>',
                ],
                [
                    'key' => 'piazza_spagna',
                    'image' => 'piazza-di-spagna.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@shaipal">Shai Pal</a> su <a href="https://unsplash.com/it/foto/una-fontana-con-una-torre-dellorologio-sullo-sfondo-3rbqwaYnf4w">Unsplash</a>',
                ],
                [
                    'key' => 'piazza_popolo',
                    'image' => 'piazza-del-popolo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@dmitrytomashek">Dmitry Tomashek</a> su <a href="https://unsplash.com/it/foto/un-gruppo-di-persone-che-camminano-intorno-a-una-piazza-della-citta-wuR8iRd4RBI">Unsplash</a>',
                ],
                [
                    'key' => 'piazza_navona',
                    'image' => 'piazza-navona.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@fmoladavis">Fernando Mola-Davis</a> su <a href="https://unsplash.com/it/foto/un-canale-con-edifici-lungo-di-esso-con-piazza-navona-sullo-sfondo-y6nWuocbW4w">Unsplash</a>',
                ],
                [
                    'key' => 'castel_santangelo',
                    'image' => 'castel-santangelo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@michelebit_">Michele Bitetto</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-Nv0gYSW1Th8">Unsplash</a>',
                ],
                [
                    'key' => 'san_pietro',
                    'image' => 'san-pietro.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@deviousmike">Michał Kostrzyński</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-e-bianco-sotto-nuvole-bianche-durante-il-giorno-pPW7xe6v4eE">Unsplash</a>',
                ],
            ];
        @endphp

        @foreach ($luoghi as $index => $luogo)
            <div class="row align-items-center mb-5 flex-md-row {{ $index % 2 === 0 ? '' : 'flex-md-row-reverse' }}">
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="{{ asset('storage/images/' . $luogo['image']) }}"
                        alt="{{ __('ui.places.' . $luogo['key'] . '.title') }}"
                        class="img-fluid img-luogo rounded shadow mb-2">
                    @if (isset($luogo['credit']))
                        <p class="text-muted small fst-italic">{!! $luogo['credit'] !!}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <h2 class="h5 text-gold">{{ __('ui.places.' . $luogo['key'] . '.title') }}</h2>
                    <p class="text-muted">{!! __('ui.places.' . $luogo['key'] . '.text') !!}</p>
                </div>
            </div>
        @endforeach

        <div class="mt-5 text-center">
            <p class="fs-5 fst-italic text-muted">
                {!! __('ui.rome_outro_text') !!}
            </p>
            <a href="{{ route('camere.index') }}" class="btn btn-gold rounded-pill mt-3">
                {{ __('ui.discover_our_rooms') }}
            </a>
        </div>
    </section>
</x-layout>
