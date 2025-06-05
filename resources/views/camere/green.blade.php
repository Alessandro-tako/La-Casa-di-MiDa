<x-layout>
    <section class="container py-5">
        <div class="row align-items-start">

            {{-- Galleria Immagini --}}
            <div class="col-md-7 text-center">
                <figure class="mb-4">
                    <img id="mainImage" src="{{ asset('storage/images/green-room/green1.jpg') }}"
                        class="main-image rounded shadow img-fluid" alt="Vista principale della Green Room">
                </figure>
                <div class="d-flex flex-wrap justify-content-center gap-2" aria-label="Galleria immagini Green Room">
                    @for ($i = 1; $i <= 12; $i++)
                        <img src="{{ asset("storage/images/green-room/green{$i}.jpg") }}" class="img-thumb rounded"
                            style="width: 80px; cursor: pointer;" alt="Miniatura Green Room {{ $i }}"
                            loading="lazy">
                    @endfor
                </div>
            </div>

            {{-- Descrizione camera --}}
            <div class="col-md-5">
                <h1 class="text-gold h3">{{ __('ui.green_room') }}</h1>
                <p class="text-muted">{{ __('ui.green_room_full_desc') }}</p>

                {{-- Servizi in camera --}}

                <ul class="list-unstyled text-muted">
                    <li><span class="me-2">•</span>{{ __('ui.grey_room_guests') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.grey_room_beds') }}</li>
                    {{-- servizi camera --}}
                    <h2 class="h5 text-gold mt-4">{{ __('ui.services_available') }}</h2>
                    <li><span class="me-2">•</span>{{ __('ui.service_wifi') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_ac') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_tv') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_nonsmoking') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_private_bathroom') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_toiletries') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_hairdryer') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_towels') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_bedding') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_safe') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_outlet') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_rack') }}</li>
                    <li><span class="me-2">•</span>{{ __('ui.service_desk') }}</li>
                </ul>
                <a href="{{ route('booking.create', ['camera' => 'Green Room']) }}"
                    class="btn btn-gold rounded-pill mt-3" title="{{ __('ui.book_this_room') }}">
                    {{ __('ui.book_this_room') }}
                </a>
            </div>

        </div>
    </section>

    {{-- Script cambio immagine --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const thumbnails = document.querySelectorAll('.img-thumb');
            const mainImage = document.getElementById('mainImage');

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', () => {
                    mainImage.src = thumb.src;
                    mainImage.alt = thumb.alt.replace('Miniatura', 'Vista');
                });
            });
        });
    </script>
</x-layout>
