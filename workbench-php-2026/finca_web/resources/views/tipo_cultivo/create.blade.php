@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow border border-amber-200">
        <h1 class="text-3xl font-bold text-amber-900 mb-6">🌱 Crear Tipo de Cultivo</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow border border-amber-200">
        <form action="{{ route('cultivos.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow border border-amber-200 mt-10">


            <!-- Sección: Información General -->
            <h2 class="text-xl font-semibold text-amber-800 mb-2">Información General</h2>
            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-semibold text-amber-900">Nombre:</label>
                    <input type="text" name="nombre" class="border rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-amber-300" value="{{ old('nombre') }}" required>
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-amber-900">Familia:</label>
                    <input type="text" name="familia" class="border rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-amber-300" value="{{ old('familia') }}">
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-amber-900">Ciclo:</label>
                    <input type="text" name="ciclo" class="border rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-amber-300" value="{{ old('ciclo') }}">
                </div>
            </div>

            <!-- Sección: Detalles del Cultivo -->
            <h2 class="text-xl font-semibold text-amber-800 mb-2 mt-6">Detalles del Cultivo</h2>
            <div>
                <label class="block mb-1 font-semibold text-amber-900">Descripción:</label>
                <textarea name="descripcion" class="border rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-amber-300">{{ old('descripcion') }}</textarea>
            </div>

            <div class="flex space-x-2 mt-4">
                <button type="submit" class="bg-amber-700 text-white px-5 py-2 rounded-lg shadow hover:bg-amber-800 transition">
                    Crear
                </button>
                <a href="{{ route('cultivos.index') }}" class="bg-gray-400 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-500 transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
