{{-- resources/views/layouts/app.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SWAPI Project</title>

    {{-- Si usas Vite en Laravel 9+ o 10+ con Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Si no usas Vite, podrías incluir Tailwind así:
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    --}}
</head>
<body class="bg-gray-100 text-gray-800">

{{-- Header --}}
<header class="bg-blue-600 text-white shadow">
    <div class="container mx-auto px-4 py-4">
        <h1 class="text-2xl font-bold">SWAPI Project</h1>
    </div>
</header>

{{-- Contenido principal --}}
<main class="container mx-auto px-4 py-8">
    @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-blue-600 text-white mt-4">
    <div class="container mx-auto px-4 py-4 text-center">
        <p>&copy; {{ date('Y') }} - SWAPI Project. Todos los derechos reservados.</p>
    </div>
</footer>

</body>
</html>
