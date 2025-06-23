<x-layout>
    <section class="container py-5">
        {{-- HERO --}}
        <header class="text-center mb-5" data-aos="fade-zoom-in">
            <h1 class="text-gold display-5">{{ __('ui.about_us_title') }}</h1>
            <p class="lead text-muted">{{ __('ui.about_us_subtitle') }}</p>
        </header>

        {{-- Storia --}}
        <article class="mb-5" aria-labelledby="titolo-storia" data-aos="fade-up">
            <h2 id="titolo-storia" class="h4 text-gold">
                <i class="bi bi-house-heart-fill me-2"></i>{{ __('ui.our_story') }}
            </h2>
            <p class="text-muted">{!! __('ui.our_story_text_1') !!}</p>
            <p class="text-muted">{!! __('ui.our_story_text_2') !!}</p>
        </article>

        {{-- Struttura --}}
        <article class="mb-5" aria-labelledby="titolo-struttura" data-aos="fade-up" data-aos-delay="100">
            <h2 id="titolo-struttura" class="h4 text-gold">
                <i class="bi bi-door-open-fill me-2"></i>{{ __('ui.the_property') }}
            </h2>
            <p class="text-muted">{!! __('ui.the_property_text_1') !!}</p>
            <p class="text-muted">{!! __('ui.the_property_text_2') !!}</p>
        </article>

        {{-- Galleria immagini --}}
        <section class="row justify-content-center mb-5" aria-labelledby="gallery-title" data-aos="fade-up"
            data-aos-delay="200">
            <div class="col-md-10 text-center">
                <h2 id="gallery-title" class="text-gold mb-4">{{ __('ui.property_gallery') }}</h2>
                <div class="mb-4">
                    <figure>
                        <img id="mainStrutturaImage" src="{{ asset('storage/images/struttura/struttura1.jpg') }}"
                            class="main-image shadow" alt="Foto principale della struttura ricettiva La Casa di MiDa">
                    </figure>
                </div>
                <div class="d-flex justify-content-center gap-2 flex-wrap" id="strutturaThumbnails">
                    @for ($i = 1; $i <= 11; $i++)
                        <img src="{{ asset('storage/images/struttura/struttura' . $i . '.jpg') }}"
                            class="img-thumb shadow-sm {{ $i === 1 ? 'active-thumb' : '' }}"
                            alt="Miniatura struttura numero {{ $i }}">
                    @endfor
                </div>
            </div>
        </section>

        <div class="text-center my-4" data-aos="fade-up" data-aos-delay="250">
            <a href="{{ route('camere.index') }}" class="btn btn-gold btn-lg rounded-pill">
                {{ __('ui.discover_all_rooms') }}
            </a>
        </div>


        {{-- Quartiere --}}
        <article class="mb-5" aria-labelledby="quartiere-title" data-aos="fade-up" data-aos-delay="300">
            <h2 id="quartiere-title" class="h4 text-gold">{{ __('ui.the_neighborhood') }}</h2>
            <p class="text-muted">{{ __('ui.the_neighborhood_text') }}</p>
        </article>

        {{-- Dintorni --}}
        <article class="mb-5" aria-labelledby="dintorni-title" data-aos="fade-up" data-aos-delay="400">
            <h2 id="dintorni-title" class="h4 text-gold">{{ __('ui.surroundings') }}</h2>
            <ul class="list-unstyled row row-cols-1 row-cols-md-2 g-3 text-muted">
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Santa Teresa – 150 m</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Piazza della Repubblica – 900 m</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Domus Aurea – 1.2 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Colosseo – 1.5 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Fontana di Trevi – 1.9 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Piazza di Spagna – 2.2 km</li>
            </ul>
        </article>

        {{-- Servizi --}}
        <article class="mb-5" aria-labelledby="servizi-title" data-aos="fade-up" data-aos-delay="500">
            <h2 id="servizi-title" class="h4 text-gold">{{ __('ui.services_available') }}</h2>

            {{-- Servizi più apprezzati --}}
            <h3 class="text-gold mt-4 h5">
                <i class="bi bi-star-fill me-2"></i>{{ __('ui.most_appreciated') }}
            </h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>{{ __('ui.service_wifi') }}</div>
                <div>{{ __('ui.service_ac') }}</div>
                <div>{{ __('ui.service_tv') }}</div>
                <div>{{ __('ui.service_nonsmoking') }}</div>
                <div>{{ __('ui.service_elevator') }}</div>
                <div>{{ __('ui.service_cleaning') }}</div>
                <div>{{ __('ui.service_coffee') }}</div>
            </div>

            {{-- Comfort in camera --}}
            <h3 class="text-gold mt-4 h5">
                <i class="bi bi-houses me-2"></i>{{ __('ui.in_room_comforts') }}
            </h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>{{ __('ui.service_private_bathroom') }}</div>
                <div>{{ __('ui.service_toiletries') }}</div>
                <div>{{ __('ui.service_hairdryer') }}</div>
                <div>{{ __('ui.service_towels') }}</div>
                <div>{{ __('ui.service_bedding') }}</div>
                <div>{{ __('ui.service_wardrobe') }}</div>
                <div>{{ __('ui.service_safe') }}</div>
                <div>{{ __('ui.service_outlet') }}</div>
                <div>{{ __('ui.service_rack') }}</div>
                <div>{{ __('ui.service_desk') }}</div>
            </div>

            {{-- Cucina e aree comuni --}}
            <h3 class="text-gold mt-4 h5">
                <i class="bi bi-cup-hot me-2"></i>{{ __('ui.kitchen_common_area') }}
            </h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>{{ __('ui.service_shared_kitchen') }}</div>
                <div>{{ __('ui.service_kettle') }}</div>
                <div>{{ __('ui.service_coffee_machine') }}</div>
                <div>{{ __('ui.service_common_room') }}</div>
                <div>{{ __('ui.service_fridge') }}</div>
            </div>

            {{-- Sicurezza --}}
            <h3 class="text-gold mt-4 h5">
                <i class="bi bi-shield-lock-fill me-2"></i>{{ __('ui.general_security') }}
            </h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>{{ __('ui.service_smoke_detector') }}</div>
                <div>{{ __('ui.service_cctv') }}</div>
                <div>{{ __('ui.service_fire_alarm') }}</div>
                <div>{{ __('ui.service_invoice') }}</div>
                <div>{{ __('ui.service_private_checkin') }}</div>
                <div>{{ __('ui.service_heating') }}</div>
                <div>{{ __('ui.service_nonsmoking_building') }}</div>
                <div>{{ __('ui.service_allergy_free') }}</div>
                <div>{{ __('ui.service_flooring') }}</div>
            </div>

            {{-- Accessibilità e lingue --}}
            <h3 class="text-gold mt-4 h5">
                <i class="bi bi-universal-access me-2"></i>{{ __('ui.accessibility_languages') }}
            </h3>
            <div class="row row-cols-1 row-cols-md-2 g-3 text-muted">
                <div>{{ __('ui.service_languages') }}</div>
            </div>
        </article>
        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="600">
            <a href="{{ route('booking.create') }}" class="btn btn-gold btn-lg rounded-pill">
                {{ __('ui.book_now') }}
            </a>
        </div>

    </section>

    {{-- Script per galleria interattiva --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainStrutturaImage');
            const thumbnails = document.querySelectorAll('#strutturaThumbnails img');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    mainImage.src = this.src;
                    thumbnails.forEach(img => img.classList.remove('active-thumb'));
                    this.classList.add('active-thumb');
                });
            });
        });
    </script>
</x-layout>
