@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">Iniciar sesión</h2>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required value="{{ old('email') }}">
            </div>
            <div>
                <label for="password" class="block font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Iniciar sesión
                </button>
            </div>
        </form>

        <p class="mt-6 text-center">¿No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate aquí</a></p>
    </div>
@endsection
