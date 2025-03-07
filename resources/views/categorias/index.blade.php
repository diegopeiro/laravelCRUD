@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Categorías</h1>

    <a href="{{ route('categorias.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
        Agregar categoria
    </a>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6">
        <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="py-3 px-6 text-left">Nombre</th>
                    <th class="py-3 px-6 text-left">Descripcion</th>
                    <th class="py-3 px-6 text-left">Duración</th>
                    <th class="py-3 px-6 text-left">Categoría</th>
                    <th class="py-3 px-6 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $categoria->nombre }}</td>
                        <td class="py-3 px-6">{{ $categoria->descripcion }}</td>
                        <td class="py-3 px-6">{{ $categoria->duracion }} min</td>
                        <td class="py-3 px-6">{{ $categoria->categoria }}</td>
                        <!--Botones acciones-->
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                                Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" onsubmit="return confirm('¿Eliminar este categoria?')">
                                @csrf @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
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
