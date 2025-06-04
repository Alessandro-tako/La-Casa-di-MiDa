<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- SEO Base --}}
    <title>@yield('title', 'La Casa di MiDa - Affittacamere a Roma Termini')</title>
    <meta name="description" content="@yield('description', 'Scopri La Casa di MiDa, affittacamere nel cuore di Roma. Camere eleganti a due passi da Termini e dal Colosseo.')">
    <meta name="keywords" content="@yield('keywords', 'affittacamere Roma, camere a Roma Termini, B&B Colosseo, alloggi Roma centro')">
    <meta name="author" content="La Casa di MiDa">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og_title', 'La Casa di MiDa')" />
    <meta property="og:description" content="@yield('og_description', 'Camere eleganti e accoglienti a Roma, a pochi passi dalla stazione Termini.')" />
    <meta property="og:image" content="@yield('og_image', asset('storage/images/roma-header.png'))" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('twitter_title', 'La Casa di MiDa')" />
    <meta name="twitter:description" content="@yield('twitter_description', 'Soggiorna a Roma in camere accoglienti, a due passi dal Colosseo.')" />
    <meta name="twitter:image" content="@yield('twitter_image', asset('storage/images/roma-header.png'))" />

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Livewire Styles --}}
    @livewireStyles

    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "LodgingBusiness",
        "name": "La Casa di MiDa",
        "description": "Accogliente affittacamere nel cuore di Roma, a due passi dalla stazione Termini.",
        "image": "https://www.lacasadimida.it/storage/images/roma-header.png", 
        "url": "https://www.lacasadimida.it",
        "telephone": "+39 333 1234567",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Via Carlo Cattaneo 10",
            "addressLocality": "Roma",
            "postalCode": "00185",
            "addressCountry": "IT"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 41.8964,
            "longitude": 12.5015
        },
        "amenityFeature": [
            {
            "@type": "LocationFeatureSpecification",
            "name": "Wi-Fi gratuito",
            "value": true
            },
            {
            "@type": "LocationFeatureSpecification",
            "name": "Aria condizionata",
            "value": true
            },
            {
            "@type": "LocationFeatureSpecification",
            "name": "Camere familiari",
            "value": true
            }
        ],
        "checkinTime": "14:00",
        "checkoutTime": "10:00"
        }
    </script>


</head>

<body>
    {{-- HEADER --}}
    <header>
        <x-navbar />
    </header>

    {{-- MAIN CONTENT --}}
    <main class="py-4" role="main">
        {{ $slot }}

        {{-- Pulsante WhatsApp Accessibile --}}
        <div class="position-fixed bottom-0 end-0 m-3 z-3" aria-label="Contattaci su WhatsApp">
            <a href="https://wa.me/393000000000" class="btn btn-success btn-lg rounded-circle shadow" target="_blank"
                rel="noopener noreferrer" title="Contattaci su WhatsApp">
                <i class="bi bi-whatsapp" aria-hidden="true"></i>
                <span class="visually-hidden">Contattaci su WhatsApp</span>
            </a>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer>
        <x-footer />
    </footer>

    {{-- Livewire Scripts --}}
    @livewireScripts

    {{-- JS Stack --}}
    @stack('scripts')
</body>

</html>
