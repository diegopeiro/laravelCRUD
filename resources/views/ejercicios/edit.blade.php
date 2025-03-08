@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Ejercicio</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ejercicios.update', $ejercicio->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="block text-gray-700 font-medium">Nombre</label>
            <input type="text" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('nombre', $ejercicio->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="block text-gray-700 font-medium">Descripción</label>
            <textarea name="descripcion" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" required>{{ old('descripcion', $ejercicio->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracion" class="block text-gray-700 font-medium">Duración (minutos)</label>
            <input type="number" name="duracion" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" value="{{ old('duracion', $ejercicio->duracion) }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="block text-gray-700 font-medium">Categoría</label>
            <select name="categoria_id" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
                <option value="">Selecciona una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ (old('categoria_id', $ejercicio->categoria_id ?? '') == $categoria->id) ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between items-center mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Actualizar</button>
            <a href="{{ route('ejercicios.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
