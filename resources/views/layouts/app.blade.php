<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--icono-->
    <link rel="icon" type="image/png" href="{{ asset('images/logoNaranja.png') }}">
    <title>@yield('title', 'Dashboard - Entrenamiento')</title>
    
    @yield('meta')

    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <x-layouts.nav />

    <main class="container mx-auto mt-6">
        @yield('content')  {{-- Contenido del Dashboard --}}
    </main>

    <!-- Footer -->
    <x-layouts.footer />

</body>
</html>
