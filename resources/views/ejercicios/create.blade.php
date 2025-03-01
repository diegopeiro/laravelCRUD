@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($ejercicio) ? 'Editar Ejercicio' : 'Nuevo Ejercicio' }}</h1>

    <form action="{{ isset($ejercicio) ? route('ejercicios.update', $ejercicio) : route('ejercicios.store') }}" method="POST">
        @csrf
        @if(isset($ejercicio))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $ejercicio->nombre ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion', $ejercicio->descripcion ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (minutos)</label>
            <input type="number" name="duracion" class="form-control" value="{{ old('duracion', $ejercicio->duracion ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $ejercicio->categoria ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($ejercicio) ? 'Actualizar' : 'Guardar' }}</button>
        <a href="{{ route('ejercicios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
