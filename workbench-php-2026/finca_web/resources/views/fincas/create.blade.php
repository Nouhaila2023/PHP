@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow border border-amber-200">
        <h1 class="text-3xl font-bold text-amber-900 mb-6">🏡 Crear Finca</h1>

        <form action="{{ route('fincas.store') }}" method="POST" class="space-y-4">
            @csrf
            @include('fincas.form')

            <div class="flex space-x-2">
                <button type="submit"
                        class="bg-amber-700 text-white px-4 py-2 rounded-lg shadow hover:bg-amber-800 transition">
                    Guardar
                </button>

                <a href="{{ route('fincas.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
