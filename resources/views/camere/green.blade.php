<x-layout>
    <section class="container py-5">
        <div class="row align-items-start">

            {{-- Immagine principale --}}
{{-- Immagine principale --}}
<div class="col-md-7 text-center">
    <div class="mb-4">
        <img id="mainImage" src="{{ asset('storage/images/green-room/green1.jpg') }}" class="main-image rounded shadow" alt="Green Room">
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2">
        @for ($i = 1; $i <= 12; $i++)
            <img src="{{ asset("storage/images/green-room/green{$i}.jpg") }}" class="img-thumb" alt="Anteprima Green {{ $i }}">
        @endfor
    </div>
</div>


            {{-- Descrizione --}}
            <div class="col-md-5">
                <h2 class="text-gold">Green Room</h2>
                <p class="text-muted">
                    La Green Room è l'ideale per famiglie o piccoli gruppi. Offre due letti singoli che possono essere uniti per formare un comodo letto matrimoniale king-size, oltre a un terzo letto temporaneo. Uno spazio versatile, confortevole e accogliente.
                </p>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-person-fill me-2"></i>Ospiti: 1–3</li>
                    <li><i class="bi bi-house-door-fill me-2"></i>Letti: 2 singoli unibili + 1 letto temporaneo</li>
                    <li><i class="bi bi-wifi me-2"></i>Wi-Fi gratuito, bagno privato, pulizia giornaliera</li>
                </ul>

                <a href="{{ route('prenota') }}" class="btn btn-gold mt-3 rounded-pill">Prenota questa camera</a>
            </div>

        </div>
    </section>

    {{-- Script cambio immagine --}}
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
