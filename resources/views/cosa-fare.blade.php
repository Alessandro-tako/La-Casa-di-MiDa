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
                <h1 class="display-5 fw-bold text-gold">Alla scoperta di Roma</h1>
                <p class="lead">Tutti i luoghi imperdibili a pochi passi dalla nostra struttura</p>
            </div>
        </header>


        <article class="mb-5">
            <h2 class="h4 text-gold">La tua avventura parte da Via Carlo Cattaneo 10</h2>
            <p class="text-muted">
                La Casa di MiDa si trova a <strong>pochi passi dalla Stazione Termini</strong>, nel cuore pulsante della
                capitale. Una posizione ideale per chi arriva in treno e vuole iniziare a esplorare Roma subito a piedi.
            </p>
        </article>

        @php
            $luoghi = [
                [
                    'Basilica di Santa Maria Maggiore',
                    'Una delle quattro basiliche papali, famosa per i suoi mosaici e l’atmosfera spirituale. A meno di 5 minuti a piedi.',
                ],
                [
                    'Teatro Brancaccio',
                    'A due passi dalla struttura, il luogo perfetto per assistere a uno spettacolo teatrale o musicale.',
                ],
                [
                    'Colosseo e Fori Imperiali',
                    'Un tuffo nella Roma antica. Raggiungibili in meno di 15 minuti a piedi.',
                ],
                ['Parco di Colle Oppio', 'Ideale per una passeggiata nel verde con vista sul Colosseo.'],
                ['Rione Monti', 'Un quartiere storico pieno di botteghe, locali autentici e angoli pittoreschi.'],
                [
                    'Piazza Venezia e Altare della Patria',
                    'Scopri la maestosità dell\'Altare della Patria e la vista panoramica su Roma.',
                ],
                [
                    'Fontana di Trevi',
                    'Lancia una monetina ed esprimi un desiderio nella fontana più famosa del mondo. A circa 20 minuti a piedi.',
                ],
                ['Via Nazionale', 'Ideale per lo shopping e collegamenti comodi con tutta la città.'],
                ['Museo Nazionale Romano', 'Un tuffo nella storia con reperti archeologici di epoca imperiale.'],
                [
                    'Piazza della Repubblica e Basilica di Santa Maria degli Angeli',
                    'Uno spazio elegante e ricco di storia a pochi minuti dalla struttura.',
                ],
            ];
        @endphp

        @foreach ($luoghi as $index => [$titolo, $descrizione])
            <article class="mb-4">
                <h2 class="h5 text-gold">{{ $index + 1 }}. {{ $titolo }}</h2>
                <p class="text-muted">{{ $descrizione }}</p>
            </article>
        @endforeach

        <div class="mt-5 text-center">
            <p class="fs-5 fst-italic text-muted">
                …e ora non ti resta che <strong>perderti tra le meraviglie della Città Eterna</strong>.
            </p>
            <a href="{{ route('camere.index') }}" class="btn btn-gold rounded-pill mt-3">Scopri le nostre camere</a>
        </div>
    </section>
</x-layout>
