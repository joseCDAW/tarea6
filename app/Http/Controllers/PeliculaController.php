<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pelicula::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelicula = Pelicula::create($request->all());
        return response()->json($pelicula, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Pelicula::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->all());
        return response()->json($pelicula, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelicula::destroy($id);
        return response()->json(null, 204);
    }

    public function buscarPorTitulo(Request $request)
    {
        // Validar que se haya proporcionado un título
        $request->validate([
            'titulo' => 'required|string',
        ]);

        // Obtener el título de la solicitud
        $titulo = $request->query('titulo');

        // Buscar películas que coincidan con el título
        $peliculas = Pelicula::where('titulo', 'like', "%$titulo%")->get();

        // Devolver la respuesta JSON
        return response()->json($peliculas);
    }
}
