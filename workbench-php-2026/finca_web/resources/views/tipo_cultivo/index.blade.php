@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-amber-900">
                🌱 Tipos de Cultivo
            </h1>

            <a href="{{ route('cultivos.create') }}"
               class="bg-amber-700 text-white px-5 py-2 rounded-lg shadow hover:bg-amber-800 transition">
                + Crear Tipo
            </a>

        </div>

        <div class="bg-white rounded-xl shadow border border-amber-200 overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-amber-100">
                <tr>
                    <th class="px-8 py-3 text-left text-sm font-semibold text-amber-900">Nombre</th>
                    <th class="px-8 py-3 text-left text-sm font-semibold text-amber-900">Familia</th>
                    <th class="px-8 py-3 text-left text-sm font-semibold text-amber-900">Ciclo</th>
                    <th class="px-8 py-3 text-center text-sm font-semibold text-amber-900">Acciones</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-amber-100">
                @foreach($cultivos as $cultivo)
                    <tr class="hover:bg-amber-50 transition">
                        <td class="px-6 py-4 text-gray-800 font-medium">
                            {{ $cultivo->nombre }}
                        </td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ $cultivo->familia }}
                        </td>
                        <td class="px-6 py-4 text-gray-700 capitalize">
                            {{ $cultivo->ciclo }}
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('cultivos.edit', $cultivo->id) }}"
                               class="bg-amber-600 text-white px-3 py-1.5 rounded-md hover:bg-amber-700 transition">
                                Editar
                            </a>

                            <form action="{{ route('cultivos.destroy', $cultivo->id) }}"
                                  method="POST"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('¿Seguro que quieres eliminar este cultivo?')"
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
