@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Bienvenido a SWAPI</h2>

    <a
        href="{{ route('swapi.index') }}"
        class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors"
    >
        Entrar
    </a>
@endsection
