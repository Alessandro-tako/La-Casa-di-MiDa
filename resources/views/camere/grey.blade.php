<x-layout>
    <section class="container py-5">
        <div class="row align-items-start">

            {{-- Immagine principale --}}
            <div class="col-md-7 text-center">
                <div class="mb-4">
                    <img id="mainImage" src="{{ asset('storage/images/gray-room/gray1.jpg') }}" class="main-image rounded shadow" alt="Gray Room">
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    @for ($i = 1; $i <= 8; $i++)
                        <img src="{{ asset("storage/images/gray-room/gray{$i}.jpg") }}" class="img-thumb" alt="Anteprima Gray {{ $i }}">
                    @endfor
                </div>
            </div>

            {{-- Descrizione --}}
            <div class="col-md-5">
                <h2 class="text-gold">Gray Room</h2>
                <p class="text-muted">
                    La Gray Room offre un ambiente moderno e rilassante. Dispone di due letti singoli che, se uniti, formano un ampio letto matrimoniale king-size, e un terzo letto temporaneo per la massima flessibilità. Ideale per famiglie o piccoli gruppi.
                </p>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-person-fill me-2"></i>Ospiti: 1–3</li>
                    <li><i class="bi bi-house-door-fill me-2"></i>Letti: 2 Singoli unibili + 1 Letto temporaneo</li>
                    <li><i class="bi bi-wifi me-2"></i>Wi-Fi gratuito, bagno privato, pulizia giornaliera</li>
                </ul>

                <a href="{{ route('prenota') }}" class="btn btn-gold mt-3 rounded-pill">Prenota questa camera</a>
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
