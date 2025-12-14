<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="min-h-screen flex flex-col">

    {{-- Navegación --}}
    @include('layouts.navigation')

    {{-- Cabecero marrón --}}
    @isset($header)
        <header class="bg-amber-900 text-white shadow-lg rounded-b-lg">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <div class="text-2xl sm:text-3xl font-bold">
                        🌱 Mi Aplicación de Fincas
                    </div>
                    {{-- aquí puedes poner botones si quieres --}}
                </div>
            </header>

            {{-- Aquí puedes poner botones o enlaces de acción --}}
                @isset($headerAction)
                    <div>
                        {{ $headerAction }}
                    </div>
                @endisset
            </div>
        </header>
    @endisset

    {{-- Contenido principal --}}
    <main class="flex-1 mt-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    {{-- Footer opcional --}}
    <footer class="bg-amber-900 text-white py-4 mt-auto text-center text-sm">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.
    </footer>

</div>
</body>
</html>
