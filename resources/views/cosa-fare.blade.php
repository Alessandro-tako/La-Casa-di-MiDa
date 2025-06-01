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
                La Casa di MiDa si trova a <strong>pochi passi dalla Stazione Termini</strong>, nel cuore pulsante della capitale. Una posizione ideale per chi arriva in treno e vuole iniziare a esplorare Roma subito a piedi. Grazie alla sua collocazione strategica, potrai raggiungere in pochi minuti alcuni dei monumenti più iconici della Città Eterna, con facilità sia a piedi che tramite la rete di trasporto pubblico.
            </p>
        </article>

        @php
            $luoghi = [
                [
                    'title' => 'Basilica di San Pietro',
                    'text' => 'La Basilica di San Pietro, cuore spirituale del mondo cattolico, è una tappa imprescindibile. Ammira la magnifica piazza e sali sulla cupola progettata da Michelangelo per goderti una vista mozzafiato su Roma. Raggiungibile in circa 20 minuti con la metro A da Termini, fermata Ottaviano.',
                    'image' => 'san-pietro.jpg'
                ],
                [
                    'title' => 'Colosseo',
                    'text' => 'Il Colosseo è il simbolo per eccellenza della città eterna. Questo maestoso anfiteatro, risalente al I secolo, è raggiungibile a piedi in circa 15 minuti dalla struttura. Una meta perfetta per chi vuole vivere la storia dell’antica Roma.',
                    'image' => 'colosseo.jpg'
                ],
                [
                    'title' => 'Castel Sant’Angelo',
                    'text' => 'Affacciato sul Tevere, Castel Sant’Angelo è una fortezza storica che ospita oggi un museo. Percorri il suggestivo Ponte Sant’Angelo ornato di statue per accedervi. Raggiungibile in 25 minuti con la metro A (fermata Lepanto) e una breve passeggiata.',
                    'image' => 'castel-santangelo.jpg'
                ],
                [
                    'title' => 'Fontana di Trevi',
                    'text' => 'La Fontana di Trevi è una delle attrazioni più romantiche e fotografate di Roma. Lancia una monetina e affidati alla leggenda: tornerai nella capitale! Raggiungibile a piedi in 18 minuti o con il bus 64 in circa 10 minuti.',
                    'image' => 'fontana-di-trevi.jpg'
                ],
                [
                    'title' => 'Piazza di Spagna',
                    'text' => 'Con la scalinata di Trinità dei Monti e la Fontana della Barcaccia, Piazza di Spagna è una delle icone del centro storico. Ideale per lo shopping e per scattare splendide foto. Dista circa 20 minuti a piedi o 10 minuti con la metro A da Termini.',
                    'image' => 'piazza-di-spagna.jpg'
                ],
                [
                    'title' => 'Fori Imperiali',
                    'text' => 'Un percorso archeologico tra i resti dei templi, archi e mercati dell’Impero Romano. Passeggiare tra i Fori è come viaggiare nel tempo. A soli 15 minuti a piedi dalla struttura.',
                    'image' => 'fori-imperiali.jpg'
                ],
                [
                    'title' => 'Basilica di Santa Maria Maggiore',
                    'text' => 'Uno dei principali luoghi di culto cattolico e una delle basiliche più antiche della città. Famosa per i suoi mosaici bizantini e le cappelle decorate, dista solo 5 minuti a piedi dalla nostra struttura.',
                    'image' => 'santa-maria-maggiore.jpg'
                ],
                [
                    'title' => 'Teatro Brancaccio',
                    'text' => 'A pochi metri dalla Casa di MiDa, il Teatro Brancaccio propone spettacoli teatrali, musicali e concerti. Un punto di riferimento culturale perfetto per chi ama l’arte dal vivo.',
                    'image' => 'teatro-brancaccio.jpg'
                ],
                [
                    'title' => 'Parco di Colle Oppio',
                    'text' => 'Un grande spazio verde a ridosso del Colosseo, ideale per rilassarsi con una passeggiata, un picnic o semplicemente per godersi una splendida vista sul monumento più famoso di Roma. A soli 12 minuti a piedi.',
                    'image' => 'colle-oppio.jpg'
                ]
            ];
        @endphp

        @foreach ($luoghi as $index => $luogo)
            <div class="row align-items-center mb-5 flex-md-row {{ $index % 2 === 0 ? '' : 'flex-md-row-reverse' }}">
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="{{ asset('storage/images/' . $luogo['image']) }}" alt="{{ $luogo['title'] }}" class="img-fluid img-luogo rounded shadow">
                </div>
                <div class="col-md-6">
                    <h2 class="h5 text-gold">{{ $luogo['title'] }}</h2>
                    <p class="text-muted">{{ $luogo['text'] }}</p>
                </div>
            </div>
        @endforeach

        <div class="mt-5 text-center">
            <p class="fs-5 fst-italic text-muted">
                …e ora non ti resta che <strong>perderti tra le meraviglie della Città Eterna</strong>.
            </p>
            <a href="{{ route('camere.index') }}" class="btn btn-gold rounded-pill mt-3">Scopri le nostre camere</a>
        </div>
    </section>
</x-layout>
