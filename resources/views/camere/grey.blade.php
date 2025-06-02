<x-layout>
    <section class="container py-5">
        <div class="row align-items-start">

            {{-- Immagine principale --}}
            <div class="col-md-7 text-center">
                <div class="mb-4">
                    <img id="mainImage" src="{{ asset('storage/images/gray-room/gray1.jpg') }}"
                        class="main-image rounded shadow" alt="Gray Room">
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    @for ($i = 1; $i <= 8; $i++)
                        <img src="{{ asset("storage/images/gray-room/gray{$i}.jpg") }}" class="img-thumb"
                            alt="Gray Room Thumbnail {{ $i }}">
                    @endfor
                </div>
            </div>

            {{-- Descrizione --}}
            <div class="col-md-5">
                <h2 class="text-gold">{{ __('ui.gray_room') }}</h2>
                <p class="text-muted">
                    {{ __('ui.gray_room_full_desc') }}
                </p>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-person-fill me-2"></i>{{ __('ui.gray_room_guests') }}</li>
                    <li><i class="bi bi-house-door-fill me-2"></i>{{ __('ui.gray_room_beds') }}</li>
                    <li><i class="bi bi-wifi me-2"></i>{{ __('ui.gray_room_services') }}</li>
                </ul>

                <a href="{{ route('booking.create', ['camera' => 'Grey Room']) }}" class="btn btn-gold rounded-pill">
                    {{ __('ui.book_this_room') }}
                </a>
            </div>

        </div>
    </section>

    {{-- Script per cambio immagine --}}
    <script>
        const thumbnails = document.querySelectorAll('.img-thumb');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                mainImage.src = thumb.src;
            });
        });
    </script>
</x-layout>
