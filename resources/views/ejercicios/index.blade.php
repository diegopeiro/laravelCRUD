@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ejercicios</h1>
    <a href="{{ route('ejercicios.create') }}" class="btn btn-primary">Agregar Ejercicio</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Duración</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ejercicios as $ejercicio)
                <tr>
                    <td>{{ $ejercicio->nombre }}</td>
                    <td>{{ $ejercicio->duracion }} min</td>
                    <td>{{ $ejercicio->categoria }}</td>
                    <td>
                        <a href="{{ route('ejercicios.edit', $ejercicio) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('ejercicios.destroy', $ejercicio) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Eliminar este ejercicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
