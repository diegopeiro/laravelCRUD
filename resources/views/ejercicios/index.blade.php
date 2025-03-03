@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Ejercicios</h1>

    <a href="{{ route('ejercicios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
        Agregar Ejercicio
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
                @foreach ($ejercicios as $ejercicio)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $ejercicio->nombre }}</td>
                        <td class="py-3 px-6">{{ $ejercicio->descripcion }}</td>
                        <td class="py-3 px-6">{{ $ejercicio->duracion }} min</td>
                        <td class="py-3 px-6">{{ $ejercicio->categoria }}</td>
                        <!--Botones acciones-->
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('ejercicios.edit', $ejercicio) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                                Editar
                            </a>
                            <form action="{{ route('ejercicios.destroy', $ejercicio) }}" method="POST" onsubmit="return confirm('¿Eliminar este ejercicio?')">
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
