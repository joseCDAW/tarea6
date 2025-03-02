@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h2 class="text-3xl font-semibold mb-6 text-center">Bienvenido a SWAPI</h2>

        <div class="bg-white shadow rounded p-6 mb-8">
            <h1 class="text-2xl font-bold mb-4">Selecciona una Película</h1>

            <form
                action="{{ route('swapi.details') }}"
                method="POST"
                class="max-w-sm space-y-4"
            >
                @csrf

                <div>
                    <label for="film_url" class="block font-medium mb-2">
                        Elige una película
                    </label>
                    <select
                        name="film_url"
                        id="film_url"
                        required
                        class="w-full border border-gray-300 rounded px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        <option value="">-- Elige una película --</option>
                        @foreach($films as $film)
                            <option value="{{ $film['url'] }}">
                                {{ $film['title'] }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded
                       hover:bg-blue-700 transition-colors"
                >
                    Ver detalles
                </button>
            </form>
        </div>
    </div>
@endsection
