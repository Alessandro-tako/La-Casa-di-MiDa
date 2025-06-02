<x-layout>
    <section class="container py-5">
        <div class="row align-items-start">

            {{-- Immagine principale --}}
            <div class="col-md-7 text-center">
                <div class="mb-4">
                    <img id="mainImage" src="{{ asset('storage/images/pink-room/pink1.jpg') }}"
                        class="main-image rounded shadow" alt="Pink Room">
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    @for ($i = 1; $i <= 6; $i++)
                        <img src="{{ asset("storage/images/pink-room/pink{$i}.jpg") }}" class="img-thumb"
                            alt="Anteprima Pink {{ $i }}">
                    @endfor
                </div>
            </div>

            {{-- Descrizione --}}
            <div class="col-md-5">
                <h2 class="text-gold">{{ __('ui.pink_room') }}</h2>
                <p class="text-muted">
                    {{ __('ui.pink_room_full_desc') }}
                </p>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-person-fill me-2"></i>{{ __('ui.pink_room_guests') }}</li>
                    <li><i class="bi bi-house-door-fill me-2"></i>{{ __('ui.pink_room_beds') }}</li>
                    <li><i class="bi bi-wifi me-2"></i>{{ __('ui.pink_room_services') }}</li>
                </ul>

                <a href="{{ route('booking.create', ['camera' => 'Pink Room']) }}" class="btn btn-gold rounded-pill">
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
