<x-layout>
    @section('title', 'Accesso Amministratori | La Casa di MiDa')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-body p-5">
                        <h1 class="text-center mb-4 text-gold">Accesso Amministratori</h1>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" aria-label="Login amministratori">
                            @csrf

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" required autofocus
                                    autocomplete="email" aria-describedby="emailHelp">
                                @error('email')
                                    <div class="text-danger mt-1" id="emailHelp">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="current-password">
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Ricordami --}}
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Ricordami</label>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 rounded-pill">Accedi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
