<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">

            {{-- Header marrón --}}
            <div class="card-header text-white text-center py-4" style="background-color: #A0522D; border-radius: 0.5rem;">
                <h3 class="mb-1">🌱 Mi Aplicación de Fincas</h3>
                <small>Inicia sesión para continuar</small>
            </div>

            {{-- Espacio antes del formulario --}}
            <div class="card-body mt-3">
                <x-auth-session-status class="mb-3" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary px-4 py-2">
                            Volver
                        </a>
                        <button type="submit" class="btn px-4 py-2" style="background-color: #A0522D; color: white;">
                            Log in
                        </button>
                    </div>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="text-decoration-underline text-muted">
                                Forgot your password?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
