@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-8">
        {{-- Encabezado de la película --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold mb-2">{{ $filmDetails['title'] }}</h1>
            <p class="text-gray-600 mb-1">
                <span class="font-semibold">Director:</span> {{ $filmDetails['director'] }}
            </p>
            <p class="text-gray-600">
                <span class="font-semibold">Fecha de lanzamiento:</span> {{ $filmDetails['release_date'] }}
            </p>
        </div>

        {{-- Personajes --}}
        <h2 class="text-2xl font-semibold mb-4">Personajes</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($characters as $character)
                <div class="bg-white rounded shadow p-4">
                    <h3 class="text-xl font-bold mb-2">{{ $character['name'] }}</h3>

                    {{-- Ejemplo de detalles adicionales (opcional) --}}
                    <p class="text-gray-700"><strong>Altura:</strong> {{ $character['height'] }}</p>
                    <p class="text-gray-700"><strong>Masa:</strong> {{ $character['mass'] }}</p>
                    <p class="text-gray-700"><strong>Color de Cabello:</strong> {{ $character['hair_color'] }}</p>
                    <p class="text-gray-700"><strong>Color de Ojos:</strong> {{ $character['eye_color'] }}</p>
                    <p class="text-gray-700"><strong>Género:</strong> {{ $character['gender'] }}</p>

                    {{-- Vehículos (si existen) --}}
                    @if (!empty($character['vehicles_data']))
                        <h4 class="text-lg font-semibold mt-3 mb-1">Vehículos</h4>
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach($character['vehicles_data'] as $vehicle)
                                <li>{{ $vehicle['name'] }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-3 text-sm text-gray-500">No tiene vehículos.</p>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- Botón para volver a la lista de películas --}}
        <div class="mt-6">
            <a href="{{ route('swapi.index') }}"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded
                  hover:bg-blue-700 transition-colors"
            >
                Volver a la lista de películas
            </a>
        </div>
    </div>
@endsection
