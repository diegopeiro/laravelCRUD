@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        {{ isset($ejercicio) ? 'Editar Ejercicio' : 'Nuevo Ejercicio' }}
    </h1>

    <form action="{{ isset($ejercicio) ? route('ejercicios.update', $ejercicio) : route('ejercicios.store') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($ejercicio))
            @method('PUT')
        @endif

        <div>
            <label for="nombre" class="block text-gray-700 font-medium">Nombre</label>
            <input type="text" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('nombre', $ejercicio->nombre ?? '') }}">
        </div>

        <div>
            <!--Limitar la descripcion a 50 caracteres (por ejemplo)-->
            <label for="descripcion" class="block text-gray-700 font-medium">Descripción</label>
            <textarea name="descripcion" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" maxlength="50">{{ old('descripcion', $ejercicio->descripcion ?? '') }}</textarea>
        </div>

        <div>
            <label for="duracion" class="block text-gray-700 font-medium">Duración (minutos)</label>
            <input type="number" name="duracion" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('duracion', $ejercicio->duracion ?? '') }}">
        </div>

        <div>
            <label for="categoria" class="block text-gray-700 font-medium">Categoría</label>
            <input type="text" name="categoria" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('categoria', $ejercicio->categoria ?? '') }}">
        </div>

        <div class="flex justify-between items-center mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">
                {{ isset($ejercicio) ? 'Actualizar' : 'Guardar' }}
            </button>
            <a href="{{ route('ejercicios.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
