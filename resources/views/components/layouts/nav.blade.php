<nav class="bg-blue-600 p-4 text-white ">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo o enlace al Dashboard -->
        <a href="{{ route('dashboard') }}" class="font-bold text-lg">🏀 Entrenamiento</a>

        <!-- Menú de navegación -->
        <div class="flex items-center space-x-4">
            <!--Enlace a tabla Ejercicios-->
            <a href="{{ route('ejercicios.index') }}" class="hover:underline">Ejercicios</a>
            <!--Enlace a tabla Categorías-->
            <a href="{{ route('categorias.index') }}" class="hover:underline">Categoría</a>

            @auth
                <!-- Mostrar nombre del usuario autenticado -->
                <span class="font-semibold">Bienvenido, {{ auth()->user()->name }}</span>

                <!-- Formulario para Cerrar Sesión -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <!-- Si no está autenticado, mostrar el enlace de Login -->
                <a href="{{ route('login') }}" class="bg-green-500 px-3 py-1 rounded hover:bg-green-700">
                    Iniciar Sesión
                </a>
            @endauth
        </div>
    </div>
</nav>
