<x-layout>
    {{-- Header principale --}}
    <section class="container py-5" aria-labelledby="contatti-title" data-aos="fade-zoom-in">
        <header class="text-center">
            <h1 id="contatti-title" class="text-gold mb-3">{{ __('ui.contact_us') }}</h1>
            <p class="text-muted">{{ __('ui.contact_subtitle') }}</p>
        </header>
    </section>

    {{-- Contatti e mappa --}}
    <section class="container mb-5" aria-labelledby="info-contatti">
        <div class="row align-items-center g-5">
            <div class="col-md-6" data-aos="fade-right">
                <article itemscope itemtype="https://schema.org/LocalBusiness">
                    <h2 id="info-contatti" class="text-gold mb-4">{{ __('ui.our_contacts') }}</h2>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-3">
                            <i class="bi bi-geo-alt-fill me-2 text-gold"></i>
                            <strong>{{ __('ui.address') }}:</strong>
                            <span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                <span itemprop="streetAddress">Via Carlo Cattaneo 10</span>,
                                <span itemprop="addressLocality">Roma</span> (RM)
                            </span>
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-envelope-fill me-2 text-gold"></i>
                            <strong>{{ __('ui.email') }}:</strong>
                            <a href="mailto:info@lacasadimida.it" class="text-decoration-none link-dark"
                                itemprop="email">info@lacasadimida.it</a>
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-phone-fill me-2 text-gold"></i>
                            <strong>{{ __('ui.phone') }}:</strong>
                            <a href="tel:+393488548971" class="text-decoration-none link-dark" itemprop="telephone">+39 348 854 8971</a>
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-whatsapp me-2 text-gold"></i>
                            <strong>WhatsApp:</strong>
                            <a href="https://wa.me/393488548971" target="_blank" class="text-decoration-none link-dark"
                                rel="noopener noreferrer" itemprop="telephone">+39 348 854 8971</a>
                        </li>
                    </ul>

                    <a href="" class="btn btn-gold rounded-pill mt-3">{{ __('ui.book_now') }}</a>
                </article>
            </div>

            <div class="col-md-6" data-aos="fade-left">
                <div class="ratio ratio-4x3 rounded shadow">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.050063758504!2d12.50175421541894!3d41.897211779220376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f61b6b2c6e5d1%3A0xabb79de28f2332f1!2sVia%20Carlo%20Cattaneo%2C%2010%2C%2000185%20Roma%20RM!5e0!3m2!1sit!2sit!4v1716900000000"
                        title="Mappa La Casa di MiDa - Via Carlo Cattaneo 10 Roma" style="border:0;" allowfullscreen
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    {{-- Come raggiungerci --}}
    <section class="container py-5" aria-labelledby="come-raggiungerci" data-aos="fade-up">
        <header>
            <h2 id="come-raggiungerci" class="text-center text-gold mb-4">{{ __('ui.how_to_reach_us') }}</h2>
        </header>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="text-muted">
                    <strong>{{ __('ui.by_car') }}</strong> {!! __('ui.by_car_text') !!}
                </p>

                <p class="text-muted">
                    <strong>{{ __('ui.by_public_transport') }}</strong>
                </p>
                <ul class="text-muted">
                    <li><strong>Metro:</strong> {!! __('ui.metro') !!}</li>
                    <li><strong>Treno:</strong> {!! __('ui.train') !!}</li>
                    <li><strong>Autobus:</strong> {!! __('ui.buses') !!}</li>
                    <li><strong>Tram:</strong> {!! __('ui.tram') !!}</li>
                </ul>

                <p class="text-muted">
                    {!! __('ui.plan_with_moovit', [
                        'moovit' =>
                            '<a href="https://moovitapp.com/index/it/mezzi_pubblici-Via_Carlo_Cattaneo-Roma_e_Lazio-street_10640354-61" target="_blank" class="text-gold text-decoration-underline" rel="noopener noreferrer">Moovit</a>',
                        'atac' =>
                            '<a href="https://www.atac.roma.it/" target="_blank" class="text-gold text-decoration-underline" rel="noopener noreferrer">ATAC Roma</a>',
                    ]) !!}
                </p>

            </div>
        </div>
    </section>

    {{-- Form contatti --}}
    <section class="bg-light py-5" aria-labelledby="scrivici" data-aos="fade-up">
        <div class="container">
            <header class="text-center mb-4">
                <h2 id="scrivici" class="text-gold">{{ __('ui.write_us') }}</h2>
                <p class="text-muted">{{ __('ui.form_subtitle') }}</p>
            </header>
            <livewire:contatti-form />
        </div>
    </section>
</x-layout>
