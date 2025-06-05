<div class="container py-2">
    {{-- Messaggio di successo --}}
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert" aria-live="polite">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form di contatto --}}
    <form wire:submit.prevent="invia" class="row g-3" aria-labelledby="form-title">
        {{-- Titolo invisibile per screen reader --}}
        <h2 id="form-title" class="visually-hidden">{{ __('ui.write_us') }}</h2>

        {{-- Nome --}}
        <div class="col-md-6">
            <label for="nome" class="form-label">{{ __('ui.name') }}</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                placeholder="{{ __('ui.name') }}" wire:model.defer="nome" autocomplete="name" required
                aria-required="true">
            @error('nome')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" placeholder="email@esempio.it" wire:model.defer="email" autocomplete="email" required
                aria-required="true">
            @error('email')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- Messaggio --}}
        <div class="col-12">
            <label for="messaggio" class="form-label">{{ __('ui.message') }}</label>
            <textarea id="messaggio" name="messaggio" rows="5" class="form-control @error('messaggio') is-invalid @enderror"
                placeholder="{{ __('ui.message') }}" wire:model.defer="messaggio" required aria-required="true"></textarea>
            @error('messaggio')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pulsante invio --}}
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-gold rounded-pill">
                {{ __('ui.send_message') }}
            </button>
        </div>
    </form>
</div>
