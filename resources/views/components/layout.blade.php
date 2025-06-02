<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'La Casa di MiDa')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body>
    <x-navbar />

    <main class="py-4">
        {{ $slot }}

        <!-- Lingua -->
        <div class="position-fixed bottom-0 start-0 m-3 z-3">
            <form action="{{ route('locale.set') }}" method="POST" class="bg-white px-3 py-2 rounded shadow-sm border">
                @csrf
                <select name="locale" onchange="this.form.submit()"
                    class="form-select form-select-sm border-0 bg-white">
                    <option value="it" @if (app()->getLocale() == 'it') selected @endif>IT</option>
                    <option value="en" @if (app()->getLocale() == 'en') selected @endif>EN</option>
                    <option value="fr" @if (app()->getLocale() == 'fr') selected @endif>FR</option>
                    <option value="de" @if (app()->getLocale() == 'de') selected @endif>DE</option>
                    <option value="es" @if (app()->getLocale() == 'es') selected @endif>ES</option>
                </select>
            </form>
        </div>

        <!-- WhatsApp -->
        <div class="position-fixed bottom-0 end-0 m-3 z-3">
            <a href="https://wa.me/393000000000" class="btn btn-success btn-lg rounded-circle shadow" target="_blank"
                title="Contattaci su WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </main>

    <x-footer />

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Script aggiuntivi -->
    @stack('scripts')
</body>

</html>
