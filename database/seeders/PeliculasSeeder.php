<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelicula;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelicula::create([
            'titulo' => 'Drive My Car',
            'año' => 2021,
            'director' => 'Ryusuke Hamaguchi',
            'genero' => 'Drama',
            'sinopsis' => 'Un actor y director de teatro lidia con la muerte de su esposa mientras monta una obra de teatro.',
        ]);

        Pelicula::create([
            'titulo' => 'Parásitos',
            'año' => 2019,
            'director' => 'Bong Joon-ho',
            'genero' => 'Thriller, Drama',
            'sinopsis' => 'Una familia pobre se infiltra en la vida de una familia adinerada, desencadenando eventos inesperados.',
        ]);

        Pelicula::create([
            'titulo' => 'As Bestas',
            'año' => 2022,
            'director' => 'Rodrigo Sorogoyen',
            'genero' => 'Drama, Thriller',
            'sinopsis' => 'Una pareja francesa expatriada opera una granja ecológica en el campo español, pero entra en conflicto con los aldeanos.',
        ]);

        Pelicula::create([
            'titulo' => 'Anatomy of a Fall',
            'año' => 2023,
            'director' => 'Justine Triet',
            'genero' => 'Drama, Misterio',
            'sinopsis' => 'Una escritora es acusada del asesinato de su marido, y su hijo debe enfrentarse a la verdad.',
        ]);

        Pelicula::create([
            'titulo' => 'La Sustancia',
            'año' => 2023,
            'director' => 'Coralie Fargeat',
            'genero' => 'Drama, Thriller',
            'sinopsis' => 'Una celebridad en decadencia decide usar una droga del mercado negro, una sustancia que replica células y crea temporalmente una versión mejor y más joven de sí misma.',
        ]);
    }
}
