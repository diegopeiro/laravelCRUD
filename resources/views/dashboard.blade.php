@extends('layouts.app')

@section('title', 'Dashboard - Entrenamiento')

@section('meta')
    <meta name="description" content="Administra y personaliza tus entrenamientos de baloncesto desde el Dashboard.">
@endsection

@section('content')
    <h1 class="text-3xl font-bold text-center">Bienvenido al Dashboard</h1>
    <p class="text-center mt-4">Administra tus ejercicios, rutinas y estadísticas.</p>

    <div class="grid grid-cols-2 gap-6 mt-6">
        <div class="p-6 bg-white shadow-lg rounded-lg text-center">
            <h2 class="text-xl font-bold">Categorías</h2>
            <p>Organiza entrenamientos personalizados creando categorías de ejercicios.</p>
            <a href="{{ route('categorias.index') }}" class="text-blue-500">Ver más</a>
        </div>
        <div class="p-6 bg-white shadow-lg rounded-lg text-center">
            <h2 class="text-xl font-bold">Ejercicios</h2>
            <p>Accede y administra tu catálogo de ejercicios.</p>
            <a href="{{ route('ejercicios.index') }}" class="text-blue-500">Ver más</a>
        </div>
    </div>
@endsection
