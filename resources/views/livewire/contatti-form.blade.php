<div class="container py-2">
    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="invia" class="row g-3">
        {{-- Nome --}}
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                wire:model.defer="nome">
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                wire:model.defer="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Messaggio --}}
        <div class="col-12">
            <label for="messaggio" class="form-label">Messaggio</label>
            <textarea id="messaggio" rows="5" class="form-control @error('messaggio') is-invalid @enderror"
                wire:model.defer="messaggio"></textarea>
            @error('messaggio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-gold rounded-pill">Invia messaggio</button>
        </div>
    </form>
</div>
