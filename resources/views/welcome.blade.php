@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-3xl font-semibold mb-6 text-center">Bienvenido a SWAPI</h2>

        @auth
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
                <p>¡Hola, {{ Auth::user()->name }}! Has iniciado sesión correctamente.</p>
            </div>
        @endauth

        <div class="text-center">
            <a href="{{ route('swapi.index') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Entrar
            </a>
        </div>
    </div>
@endsection
