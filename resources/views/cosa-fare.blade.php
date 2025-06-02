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
                Grazie alla sua collocazione strategica, potrai raggiungere in pochi minuti alcuni dei monumenti più
                iconici della Città Eterna, con facilità sia a piedi che tramite la rete di trasporto pubblico.
            </p>
        </article>

        @php

            $luoghi = [
                [
                    'title' => 'Basilica di Santa Maria Maggiore',
                    'text' =>
                        'Uno dei principali luoghi di culto cattolico e una delle basiliche più antiche della città. Famosa per i suoi mosaici bizantini e le cappelle decorate, dista solo 5 minuti a piedi dalla nostra struttura.',
                    'image' => 'santa-maria-maggiore.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nickcastelliphotography?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Nick Castelli</a> su <a href="https://unsplash.com/it/foto/unauto-parcheggiata-davanti-a-un-grande-edificio-TQgKNmYmzyE?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Colosseo',
                    'text' =>
                        'Il Colosseo è il simbolo per eccellenza della città eterna. Questo maestoso anfiteatro, risalente al I secolo, è raggiungibile a piedi in circa 15 minuti dalla struttura. Una meta perfetta per chi vuole vivere la storia dell’antica Roma.',
                    'image' => 'colosseo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nicknight?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Nick Night</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-sotto-il-cielo-bianco-durante-il-giorno-9tOrcg9tPyM?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Fori Imperiali',
                    'text' =>
                        'Un percorso archeologico tra i resti dei templi, archi e mercati dell’Impero Romano. Passeggiare tra i Fori è come viaggiare nel tempo. A soli 15 minuti a piedi dalla struttura.',
                    'image' => 'fori-imperiali.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nathanstaz?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Nathan Staz</a> su <a href="https://unsplash.com/it/foto/le-rovine-dellantica-citta-di-roma-Vlh2VWXvrOc?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Fontana di Trevi',
                    'text' =>
                        'La Fontana di Trevi è una delle attrazioni più romantiche e fotografate di Roma. Lancia una monetina e affidati alla leggenda: tornerai nella capitale! Raggiungibile a piedi in 18 minuti o con il bus 64 in circa 10 minuti.',
                    'image' => 'fontana-di-trevi.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@ansharimages?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Andrey Omelyanchuk</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-bianco-con-fontana-dacqua-VcWIMPXiGlU?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Altare della Patria',
                    'text' =>
                        'L’Altare della Patria, anche conosciuto come Vittoriano, è uno dei monumenti più imponenti di Roma. Dedicato a Vittorio Emanuele II, ospita la tomba del Milite Ignoto e offre una vista panoramica mozzafiato dalla terrazza. Si raggiunge in circa 20 minuti a piedi dalla nostra struttura, passando per i Fori Imperiali.',
                    'image' => 'altare-della-patria.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@yayamomt?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Yahya Momtaz</a> su <a href="https://unsplash.com/it/foto/un-grande-edificio-bianco-con-una-statua-sopra-di-esso-bqxpi2Yj83Y?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Piazza di Spagna',
                    'text' =>
                        'Con la scalinata di Trinità dei Monti e la Fontana della Barcaccia, Piazza di Spagna è una delle icone del centro storico. Ideale per lo shopping e per scattare splendide foto. Dista circa 20 minuti a piedi o 10 minuti con la metro A da Termini.',
                    'image' => 'piazza-di-spagna.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@shaipal?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Shai Pal</a> su <a href="https://unsplash.com/it/foto/una-fontana-con-una-torre-dellorologio-sullo-sfondo-3rbqwaYnf4w?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Piazza del Popolo',
                    'text' =>
                        'Piazza del Popolo è una delle piazze più grandi e scenografiche di Roma, dominata dal grande obelisco egizio al centro e circondata da chiese gemelle e palazzi storici. È il punto di partenza perfetto per una passeggiata verso Villa Borghese o Via del Corso. Si raggiunge in circa 15 minuti con la metro A (fermata Flaminio) da Termini.',
                    'image' => 'piazza-del-popolo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@dmitrytomashek?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Dmitry Tomashek</a> su <a href="https://unsplash.com/it/foto/un-gruppo-di-persone-che-camminano-intorno-a-una-piazza-della-citta-wuR8iRd4RBI?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Piazza Navona',
                    'text' =>
                        'Piazza Navona è uno dei luoghi più affascinanti di Roma, famosa per la sua forma ellittica, le fontane barocche e l’atmosfera vivace. Al centro si trova la spettacolare Fontana dei Quattro Fiumi del Bernini. Perfetta per una passeggiata serale o una sosta in uno dei tanti caffè. Si può raggiungere in circa 25 minuti con il bus 64 da Termini.',
                    'image' => 'piazza-navona.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@fmoladavis?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Fernando Mola-Davis</a> su <a href="https://unsplash.com/it/foto/un-canale-con-edifici-lungo-di-esso-con-piazza-navona-sullo-sfondo-y6nWuocbW4w?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => "Castel Sant'Angelo",
                    'text' =>
                        "Affacciato sul Tevere, Castel Sant'Angelo è una fortezza storica che ospita oggi un museo. Percorri il suggestivo Ponte Sant' Angelo ornato di statue per accedervi. Raggiungibile in 25 minuti con la metro A (fermata Lepanto) e una breve passeggiata.",
                    'image' => 'castel-santangelo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@michelebit_?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Michele Bitetto</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-Nv0gYSW1Th8?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
                [
                    'title' => 'Basilica di San Pietro',
                    'text' =>
                        'La Basilica di San Pietro, cuore spirituale del mondo cattolico, è una tappa imprescindibile. Ammira la magnifica piazza e sali sulla cupola progettata da Michelangelo per goderti una vista mozzafiato su Roma. Raggiungibile in circa 20 minuti con la metro A da Termini, fermata Ottaviano.',
                    'image' => 'san-pietro.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@deviousmike?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Michał Kostrzyński</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-e-bianco-sotto-nuvole-bianche-durante-il-giorno-pPW7xe6v4eE?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>',
                ],
            ];

        @endphp

        @foreach ($luoghi as $index => $luogo)
            <div class="row align-items-center mb-5 flex-md-row {{ $index % 2 === 0 ? '' : 'flex-md-row-reverse' }}">
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="{{ asset('storage/images/' . $luogo['image']) }}" alt="{{ $luogo['title'] }}"
                        class="img-fluid img-luogo rounded shadow mb-2">
                    @if (isset($luogo['credit']))
                        <p class="text-muted small fst-italic">{!! $luogo['credit'] !!}</p>
                    @endif
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
