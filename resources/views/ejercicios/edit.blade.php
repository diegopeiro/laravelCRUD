@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ejercicio</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ejercicios.update', $ejercicio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $ejercicio->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $ejercicio->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (minutos)</label>
            <input type="number" name="duracion" class="form-control" value="{{ old('duracion', $ejercicio->duracion) }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $ejercicio->categoria) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('ejercicios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
