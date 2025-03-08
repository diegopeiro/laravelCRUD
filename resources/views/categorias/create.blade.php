@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        {{ isset($categoria) ? 'Editar categoria' : 'Nueva categoria' }}
    </h1>

    <form action="{{ isset($categoria) ? route('categorias.update', $categoria) : route('categorias.store') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($categoria))
            @method('PUT')
        @endif

        <div>
            <label for="nombre" class="block text-gray-700 font-medium">Nombre</label>
            <input type="text" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('nombre', $categoria->nombre ?? '') }}">
        </div>

        <div>
            <!--Limitar la descripcion a 50 caracteres (por ejemplo)-->
            <label for="descripcion" class="block text-gray-700 font-medium">Descripción</label>
            <textarea name="descripcion" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" maxlength="300">{{ old('descripcion', $categoria->descripcion ?? '') }}</textarea>
        </div>

        <div>
            <!--Enlos names poner el mismo nombre que la columna de la bbdd-->
            <label for="musculos_trabaja" class="block text-gray-700 font-medium">¿Qué músculos trabaja esta categoría?</label>
            <textarea name="musculos_trabaja" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" maxlength="300">{{ old('musculos_trabaja', $categoria->musculos_trabaja ?? '') }}</textarea>
        </div>

        <div>
            <label for="nivel_fatiga" class="block text-gray-700 font-medium">Nivel de fatiga</label>
            <input type="number" name="nivel_fatiga" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('nivel_fatiga', $categoria->nivel_fatiga ?? '') }}">
        </div>

        <div class="flex justify-between items-center mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">
                {{ isset($categoria) ? 'Actualizar' : 'Guardar' }}
            </button>
            <a href="{{ route('categorias.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
