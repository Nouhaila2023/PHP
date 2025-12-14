<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg p-4 rounded-4" style="max-width: 500px; width: 100%;">

            {{-- Header marrón con icono --}}
            <div class="card-header text-white text-center py-4 rounded-3" style="background-color: #A0522D;">
                <h2 class="mb-1 fw-bold">🌱 Registro de Usuario</h2>
                <p class="small mb-0">Crea tu cuenta para empezar</p>
            </div>

            {{-- Formulario --}}
            <div class="card-body mt-3">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                               class="form-control form-control-lg @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                               class="form-control form-control-lg @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               class="form-control form-control-lg @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirmar Contraseña</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg w-100 w-sm-auto">
                            Ya tienes cuenta?
                        </a>
                        <button type="submit" class="btn btn-lg text-white w-100 w-sm-auto" style="background-color: #A0522D;">
                            Registrarse
                        </button>
                    </div>
                </form>
            </div>

            {{-- Footer opcional --}}
            <div class="card-footer text-center small text-muted mt-3">
                &copy; {{ date('Y') }} Mi Aplicación. Todos los derechos reservados.
            </div>
        </div>
    </div>
</x-guest-layout>
