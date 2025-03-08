@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="block text-gray-700 font-medium">Nombre</label>
            <input type="text" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('nombre', $categoria->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="block text-gray-700 font-medium">Descripción</label>
            <textarea name="descripcion" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" required>{{ old('descripcion', $categoria->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="musculos_trabaja" class="block text-gray-700 font-medium">¿Qué músculos trabaja esta categoría?</label>
            <textarea name="musculos_trabaja" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" maxlength="50">{{ old('musculos_trabaja', $categoria->musculos_trabaja ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="nivel_fatiga" class="block text-gray-700 font-medium">Nivel de fatiga</label>
            <input type="number" name="nivel_fatiga" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('nivel_fatiga', $categoria->nivel_fatiga ?? '') }}" required>
        </div>

        <div class="flex justify-between items-center mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Actualizar</button>
            <a href="{{ route('categorias.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
