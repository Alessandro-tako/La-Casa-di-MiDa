<x-layout>
    <section class="container py-5">
        <div class="row align-items-start">

            {{-- Galleria immagini --}}
            <div class="col-md-7 text-center">
                <figure class="mb-4">
                    <img id="mainImage" src="{{ asset('storage/images/pink-room/pink1.jpg') }}"
                        class="main-image rounded shadow img-fluid" alt="Panoramica della Pink Room">
                </figure>
                <div class="d-flex flex-wrap justify-content-center gap-2" aria-label="Galleria immagini Pink Room">
                    @for ($i = 1; $i <= 6; $i++)
                        <img src="{{ asset("storage/images/pink-room/pink{$i}.jpg") }}" class="img-thumb rounded"
                            style="width: 80px; cursor: pointer;" alt="Miniatura Pink Room {{ $i }}">
                    @endfor
                </div>
            </div>

            {{-- Descrizione camera --}}
            <div class="col-md-5">
                <h1 class="text-gold h3">{{ __('ui.pink_room') }}</h1>
                <p class="text-muted">{{ __('ui.pink_room_full_desc') }}</p>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-person-fill me-2"></i>{{ __('ui.pink_room_guests') }}</li>
                    <li><i class="bi bi-house-door-fill me-2"></i>{{ __('ui.pink_room_beds') }}</li>
                    <li><i class="bi bi-wifi me-2"></i>{{ __('ui.pink_room_services') }}</li>
                </ul>

                <a href="{{ route('booking.create', ['camera' => 'Pink Room']) }}"
                    class="btn btn-gold rounded-pill mt-3" title="{{ __('ui.book_this_room') }}">
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
                    });
                });
            }
        });
    </script>
</x-layout>
