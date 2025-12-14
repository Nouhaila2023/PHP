@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow border border-amber-200">

        <h1 class="text-3xl font-bold text-amber-900 mb-6">
            🌱 Editar Tipo de Cultivo
        </h1>

        {{-- Mensaje éxito --}}
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errores --}}
        @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cultivos.update', $cultivo) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold text-amber-900 mb-1">Nombre</label>
                <input type="text" name="nombre"
                       value="{{ old('nombre', $cultivo->nombre) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <div>
                <label class="block font-semibold text-amber-900 mb-1">Familia</label>
                <input type="text" name="familia"
                       value="{{ old('familia', $cultivo->familia) }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold text-amber-900 mb-1">Ciclo</label>
                <select name="ciclo" class="w-full border rounded px-3 py-2">
                    <option value="">-- Seleccionar --</option>
                    <option value="anual" {{ old('ciclo', $cultivo->ciclo) == 'anual' ? 'selected' : '' }}>Anual</option>
                    <option value="perenne" {{ old('ciclo', $cultivo->ciclo) == 'perenne' ? 'selected' : '' }}>Perenne</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold text-amber-900 mb-1">Descripción</label>
                <textarea name="descripcion" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('descripcion', $cultivo->descripcion) }}</textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button type="submit"
                        class="bg-amber-700 text-white px-4 py-2 rounded-lg hover:bg-amber-800 transition">
                    Actualizar
                </button>

                <a href="{{ route('cultivos.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Volver
                </a>
            </div>

        </form>
    </div>
@endsection
