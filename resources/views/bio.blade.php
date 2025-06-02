<x-layout>
    <section class="container py-5">
        <!-- Hero -->
        <header class="text-center mb-5">
            <h1 class="text-gold display-5">{{ __('ui.about_us_title') }}</h1>
            <p class="lead text-muted">{{ __('ui.about_us_subtitle') }}</p>
        </header>

        <!-- La nostra storia -->
        <div class="row mb-5 align-items-center">
            <h2 class="h4 text-gold"><i class="bi bi-house-heart-fill me-2"></i>{{ __('ui.our_story') }}</h2>
            <p class="text-muted">{!! __('ui.our_story_text_1') !!}</p>
            <p class="text-muted">{!! __('ui.our_story_text_2') !!}</p>
        </div>

        <!-- La struttura -->
        <div class="row mb-5 align-items-center">
            <h2 class="h4 text-gold"><i class="bi bi-door-open-fill me-2"></i>{{ __('ui.the_property') }}</h2>
            <p class="text-muted">{!! __('ui.the_property_text_1') !!}</p>
            <p class="text-muted">{!! __('ui.the_property_text_2') !!}</p>
        </div>

        <!-- Galleria -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center">
                <h2 class="text-gold mb-4">{{ __('ui.property_gallery') }}</h2>
                <div class="mb-4">
                    <img id="mainStrutturaImage" src="{{ asset('storage/images/struttura/struttura1.jpg') }}"
                        class="main-image shadow" alt="Main property photo">
                </div>
                <div class="d-flex justify-content-center gap-2 flex-wrap" id="strutturaThumbnails">
                    @for ($i = 1; $i <= 11; $i++)
                        <img src="{{ asset('storage/images/struttura/struttura' . $i . '.jpg') }}"
                            class="img-thumb shadow-sm {{ $i === 1 ? 'active-thumb' : '' }}"
                            alt="Structure thumbnail {{ $i }}">
                    @endfor
                </div>
            </div>
        </div>

        <!-- Quartiere -->
        <article class="mb-5">
            <h2 class="h4 text-gold">{{ __('ui.the_neighborhood') }}</h2>
            <p class="text-muted">{{ __('ui.the_neighborhood_text') }}</p>
        </article>

        <!-- Dintorni -->
        <article class="mb-5">
            <h2 class="h4 text-gold">{{ __('ui.surroundings') }}</h2>
            <ul class="list-unstyled row row-cols-1 row-cols-md-2 g-3 text-muted">
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Santa Teresa – 150 m</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Piazza della Repubblica – 900 m</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Domus Aurea – 1.2 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Colosseo – 1.5 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Fontana di Trevi – 1.9 km</li>
                <li><i class="bi bi-geo-alt-fill text-gold me-2"></i> Piazza di Spagna – 2.2 km</li>
            </ul>
        </article>

        <!-- Servizi -->
        <article class="mb-5">
            <h2 class="h4 text-gold">{{ __('ui.services_available') }}</h2>

            <h5 class="text-gold mt-4"><i class="bi bi-star-fill me-2"></i>{{ __('ui.most_appreciated') }}</h5>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>{{ __('ui.service_wifi') }}</div>
                <div>{{ __('ui.service_ac') }}</div>
                <div>{{ __('ui.service_tv') }}</div>
                <div>{{ __('ui.service_nonsmoking') }}</div>
                <div>{{ __('ui.service_elevator') }}</div>
                <div>{{ __('ui.service_cleaning') }}</div>
                <div>{{ __('ui.service_coffee') }}</div>
            </div>

            <h5 class="text-gold mt-4"><i class="bi bi-houses"></i> {{ __('ui.in_room_comforts') }}</h5>
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

            <h5 class="text-gold mt-4"><i class="bi bi-cup-hot me-2"></i>{{ __('ui.kitchen_common_area') }}</h5>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 text-muted">
                <div>{{ __('ui.service_shared_kitchen') }}</div>
                <div>{{ __('ui.service_kettle') }}</div>
                <div>{{ __('ui.service_coffee_machine') }}</div>
                <div>{{ __('ui.service_common_room') }}</div>
                <div>{{ __('ui.service_fridge') }}</div>
            </div>

            <h5 class="text-gold mt-4"><i class="bi bi-shield-lock-fill me-2"></i>{{ __('ui.general_security') }}</h5>
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

            <h5 class="text-gold mt-4"><i
                    class="bi bi-universal-access me-2"></i>{{ __('ui.accessibility_languages') }}</h5>
            <div class="row row-cols-1 row-cols-md-2 g-3 text-muted">
                <div>{{ __('ui.service_languages') }}</div>
            </div>
        </article>
    </section>

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
