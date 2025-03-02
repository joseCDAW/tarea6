<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SwapiController extends Controller
{
    //


public function index()
{
    $response = Http::get('https://swapi.dev/api/films/');
    $films = $response->json()['results'] ?? [];
    // Opcional: Ordenar o formatear la información si es necesario.
    return view('swapi.index', compact('films'));
}

    public function showFilmDetails(Request $request)
    {
        $filmUrl = $request->input('film_url');
        $filmResponse = Http::get($filmUrl);
        $filmDetails = $filmResponse->json();

        $characters = [];

        // Recorremos los personajes de la película
        foreach ($filmDetails['characters'] as $charUrl) {
            $charResponse = Http::get($charUrl);
            $charData = $charResponse->json();

            // Aquí recuperamos los vehículos
            $vehicles = [];
            if (!empty($charData['vehicles'])) {
                foreach ($charData['vehicles'] as $vehicleUrl) {
                    $vehicleResponse = Http::get($vehicleUrl);
                    $vehicleData = $vehicleResponse->json();
                    $vehicles[] = $vehicleData;
                }
            }

            // Guardamos la información de los vehículos en un nuevo índice, por ejemplo "vehicles_data"
            $charData['vehicles_data'] = $vehicles;

            // Añadimos el personaje (con sus vehículos) al array de personajes
            $characters[] = $charData;
        }

        // Pasamos todo a la vista
        return view('swapi.details', compact('filmDetails', 'characters'));
    }



}
