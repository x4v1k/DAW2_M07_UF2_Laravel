<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    private $datasource = [
        [
            "name" => "La Rosa Púrpura del Cairo",
            "year" => 1985,
            "genre" => "Drama",
            "img_url" => "https://es.web.img2.acsta.net/medias/nmedia/18/79/45/34/20253823.jpg"
        ],
        [
            "name" => "El Club de los Cinco",
            "year" => 1985,
            "genre" => "Comedia",
            "img_url" => "https://pics.filmaffinity.com/El_club_de_los_cinco-192309838-large.jpg"
        ],
        [
            "name" => "Forrest Gump",
            "year" => 1994,
            "genre" => "Drama",
            "img_url" => "https://pics.filmaffinity.com/Forrest_Gump-212765827-large.jpg"
        ],
        [
            "name" => "Arrival",
            "year" => 2016,
            "genre" => "Ciencia Ficción",
            "img_url" => "https://pics.filmaffinity.com/La_llegada-686966912-large.jpg"
        ],
        [
            "name" => "As Bestas",
            "year" => 2022,
            "genre" => "Drama",
            "img_url" => "https://pics.filmaffinity.com/As_bestas-275688233-large.jpg"
        ],
    ];
    /**
     * Lista las pelis más antiguas que el año recibido como parámetro
     * y si no viene, más antiguas que el año 2000
     */
    public function listOldFilms($year = null)
    {

        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $titulo = "Listado de Pelis Antiguas (Antes de $year)";

        foreach ($this->datasource as $peli) {
            if ($peli['year'] < $year)
                $old_films[] = $peli;
        }
        return view('peliculas.listado', ["pelis" => $old_films, "titulo" => $titulo]);
    }
    /**
     * Lista las pelis más nuevas que el 2000
     */
    public function listNewFilms($year = null)
    {

        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $titulo = "Listado de Pelis Nuevas (Después de $year)";

        foreach ($this->datasource as $peli) {
            if ($peli['year'] >= $year)
                $new_films[] = $peli;
        }
        return view('peliculas.listado', ["pelis" => $new_films, "titulo" => $titulo]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $categoria = null)
    {
        $films_filtered = [];
        $titulo = "Listado de todas las pelis";
        if (is_null($year) && is_null($categoria))
            return view('peliculas.listado', ["pelis" => $this->datasource, "titulo" => $titulo]);

       
        //Si el year no existe y la categoría existe

        foreach ($this->datasource as $peli) {
            if ((!is_null($year) && is_null($categoria)) && $peli['year'] == $year){
                $titulo = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $peli;

            }else if((is_null($year) && !is_null($categoria)) && strtolower($peli['genre']) == strtolower($categoria)){
                $titulo = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $peli;
            }else if(!is_null($year) && !is_null($categoria) && strtolower($peli['genre']) == strtolower($categoria) && $peli['year'] == $year){
                //Que el año y la categoría se han pasado
                $titulo = "Listado de todas las pelis filtrado x categoria y año";

                $films_filtered[] = $peli;
            }
        }
        return view("peliculas.listado", ["pelis" => $films_filtered, "titulo" => $titulo]);

    }
}
