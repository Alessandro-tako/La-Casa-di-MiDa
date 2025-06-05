<x-layout>
    <section class="container py-5">
        <div class="row align-items-start">

            {{-- Galleria immagini --}}
            <div class="col-md-7 text-center">
                <figure class="mb-4">
                    <img id="mainImage" src="{{ asset('storage/images/grey-room/grey1.jpg') }}"
                        class="main-image rounded shadow img-fluid" alt="Panoramica della Grey Room">
                </figure>
                <div class="d-flex flex-wrap justify-content-center gap-2" aria-label="Galleria immagini Grey Room">
                    @for ($i = 1; $i <= 8; $i++)
                        <img src="{{ asset("storage/images/grey-room/grey{$i}.jpg") }}" class="img-thumb rounded"
                            style="width: 80px; cursor: pointer;" alt="Miniatura Grey Room {{ $i }}"
                            loading="lazy">
                    @endfor
                </div>
            </div>

            {{-- Descrizione camera --}}
            <div class="col-md-5">
                <h1 class="text-gold h3">{{ __('ui.grey_room') }}</h1>
                <p class="text-muted">{{ __('ui.grey_room_full_desc') }}</p>
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

                <a href="{{ route('booking.create', ['camera' => 'Grey Room']) }}"
                    class="btn btn-gold rounded-pill mt-3" title="{{ __('ui.book_this_room') }}"
                    aria-label="{{ __('ui.book_this_room') }}">
                    {{ __('ui.book_this_room') }}
                </a>
            </div>


        </div>
    </section>

    {{-- Script per anteprima immagine --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const thumbnails = document.querySelectorAll('.img-thumb');
            const mainImage = document.getElementById('mainImage');

            if (mainImage) {
                thumbnails.forEach(thumb => {
                    thumb.addEventListener('click', () => {
                        mainImage.src = thumb.src;
                        thumbnails.forEach(t => t.classList.remove('active-thumb'));
                        thumb.classList.add('active-thumb');
                    });
                });
            }
        });
    </script>
</x-layout>
