<x-layout>
    <section class="container py-5">
        <div class="text-center mb-5">
            <h1 class="text-gold">Le nostre camere</h1>
            <p class="text-muted">Tre ambienti esclusivi per offrirti il massimo comfort durante il tuo soggiorno a Roma.</p>
        </div>

        {{-- Green Room --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div id="carouselGreen" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/images/green-room/green1.jpg') }}" class="d-block w-100 rounded" alt="Green Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/green-room/green2.jpg') }}" class="d-block w-100 rounded" alt="Green Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/green-room/green3.jpg') }}" class="d-block w-100 rounded" alt="Green Room">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGreen" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGreen" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-gold">Green Room</h2>
                <p class="text-muted">La Green Room offre un ambiente rilassante ispirato alla natura, con arredi raffinati e comfort moderni. Perfetta per chi cerca tranquillità ed eleganza nel cuore di Roma.</p>
                <a href="{{ route('camere.green') }}" class="btn btn-gold mt-3 rounded-pill">Scopri di più</a>
            </div>
        </div>

        {{-- Pink Room --}}
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <div id="carouselPink" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/images/pink-room/pink1.jpg') }}" class="d-block w-100 rounded" alt="Pink Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/pink-room/pink2.jpg') }}" class="d-block w-100 rounded" alt="Pink Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/pink-room/pink3.jpg') }}" class="d-block w-100 rounded" alt="Pink Room">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPink" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPink" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-gold">Pink Room</h2>
                <p class="text-muted">Con le sue tonalità delicate e l’atmosfera accogliente, la Pink Room è l’ideale per una fuga romantica o un soggiorno rilassante in un ambiente raffinato.</p>
                <a href="{{ route('camere.pink') }}" class="btn btn-gold mt-3 rounded-pill">Scopri di più</a>
            </div>
        </div>

        {{-- Gray Room --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div id="carouselGray" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/images/gray-room/gray1.jpg') }}" class="d-block w-100 rounded" alt="Gray Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/gray-room/gray2.jpg') }}" class="d-block w-100 rounded" alt="Gray Room">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/images/gray-room/gray3.jpg') }}" class="d-block w-100 rounded" alt="Gray Room">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGray" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGray" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-gold">Gray Room</h2>
                <p class="text-muted">La Gray Room combina design moderno e comfort esclusivo, offrendo un’atmosfera rilassante e raffinata per ogni tipo di viaggiatore.</p>
                <a href="{{ route('camere.grey') }}" class="btn btn-gold mt-3 rounded-pill">Scopri di più</a>
            </div>
        </div>
    </section>
</x-layout>
