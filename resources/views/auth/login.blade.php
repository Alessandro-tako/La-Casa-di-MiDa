<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4" style="color: #d4af37;">Accesso Amministratori</h2>

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" name="password" class="form-control" required>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

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
