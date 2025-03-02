<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWAPI</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
<!-- Navbar -->
<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-800">SWAPI</a>
            </div>
            <div class="flex items-center space-x-4">
               
                <!-- Botón de cerrar sesión (solo visible si el usuario está autenticado) -->
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Contenido principal -->
<main class="flex-grow py-8">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white shadow-md mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="text-center md:text-left">
                <p class="text-gray-600">&copy; {{ date('Y') }} SWAPI. Todos los derechos reservados.</p>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">Política de Privacidad</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">Términos y Condiciones</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
