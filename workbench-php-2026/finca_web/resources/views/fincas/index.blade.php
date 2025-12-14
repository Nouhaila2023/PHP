@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded-xl shadow border border-amber-200">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-amber-900">
                🏡 Mis Fincas
            </h1>
            <a href="{{ route('fincas.create') }}"
               class="bg-amber-700 text-white px-5 py-2 rounded-lg shadow hover:bg-amber-800 transition">
                + Crear Finca
            </a>
        </div>

        @if(session('success'))
            <div class="bg-amber-100 text-amber-800 px-4 py-2 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl shadow overflow-hidden">
                <thead class="bg-amber-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-amber-900">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-amber-900">Hectáreas</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-amber-900">Acciones</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-amber-100">
                @foreach($fincas as $finca)
                    <tr class="hover:bg-amber-50 transition">
                        <td class="px-6 py-4 text-gray-800 font-medium">{{ $finca->nombre }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $finca->hectareas_totales }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('fincas.edit', $finca->id) }}"
                               class="bg-amber-600 text-white px-3 py-1.5 rounded-md hover:bg-amber-700 transition">
                                Editar
                            </a>

                            <form action="{{ route('fincas.destroy', $finca->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('¿Seguro que quieres eliminar esta finca?')"
                                        class="bg-amber-800 text-white px-3 py-1.5 rounded-md hover:bg-amber-900 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
