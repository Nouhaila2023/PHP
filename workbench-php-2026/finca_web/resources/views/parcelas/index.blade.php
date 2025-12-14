@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Parcelas de {{ $finca->nombre }}</h1>

        <a href="{{ route('parcelas.create', $finca->id) }}" class="mb-4 inline-block bg-amber-900 text-white px-4 py-2 rounded">Agregar Parcela</a>

        <table class="min-w-full bg-white border">
            <thead>
            <tr>
                <th class="py-2 px-4 border">Nombre</th>
                <th class="py-2 px-4 border">Hectáreas</th>
                <th class="py-2 px-4 border">Tipo de Cultivo</th>
                <th class="py-2 px-4 border">Estado</th>
                <th class="py-2 px-4 border">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($parcelas as $parcela)
                <tr>
                    <td class="py-2 px-4 border">{{ $parcela->nombre }}</td>
                    <td class="py-2 px-4 border">{{ $parcela->hectareas }}</td>
                    <td class="py-2 px-4 border">{{ $parcela->tipoCultivo->nombre }}</td>
                    <td class="py-2 px-4 border">{{ $parcela->estado }}</td>
                    <td class="py-2 px-4 border">

                        <a href="{{ route('parcelas.edit', $parcela->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Editar</a>

                        <form action="{{ route('parcelas.destroy', $parcela->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                        </form>

                        <a href="{{ route('parcelas.show', $parcela->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $parcelas->links() }}
        </div>
    </div>
@endsection
