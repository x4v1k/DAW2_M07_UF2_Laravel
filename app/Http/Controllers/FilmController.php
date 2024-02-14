<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array {
        $filmsJson = Storage::get('public/films.json');
        $filmsJson1 = json_decode($filmsJson,true);
        $filmsDB = DB::table('films')->select('name','year','genre','country','duration','img_url')->get();
        $filmsArray = json_decode(json_encode($filmsDB),true);
        $films = array_merge($filmsJson1,$filmsArray);
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {        
        $old_films = [];
        if (is_null($year))
        $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = FilmController::readFilms();

        foreach ($films as $film) {
        //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];
        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();
    
        // If both year and genre are null, return all films
        if (is_null($year) && is_null($genre)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }
    
        // Filter films based on year and/or genre
        foreach ($films as $film) {
            $yearMatches = is_null($year) || $film['year'] == $year;
            $genreMatches = is_null($genre) || strtolower($film['genre']) == strtolower($genre);
    
            if ($yearMatches && $genreMatches) {
                $films_filtered[] = $film;
            }
        }
    
        // Adjust the title based on the provided parameters
        if (!is_null($year)) {
            $title .= " filtrado por año";
        }
    
        if (!is_null($genre)) {
            $title .= " filtrado por categoría";
        }
    
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function listFilmsByYear($year = null)
{
    return $this->listFilms($year);
}

public function listFilmsByGenre($genre = null)
{
    return $this->listFilms(null, $genre);
}

public function sortFilms($genre = null)
{
    $films_filtered = [];
    $title = "Listado de todas las pelis por orden descendente";
    $films = FilmController::readFilms();

    // Sort films by year in descending order
    usort($films, function ($a, $b) {
        return $b['year'] <=> $a['year'];
    });

    // If genre is null, return all films
    if (is_null($genre)) {
        return view('films.list', ["films" => $films, "title" => $title]);
    }

    // Filter films based on genre
    foreach ($films as $film) {
        $genreMatches = is_null($genre) || strtolower($film['genre']) == strtolower($genre);

        if ($genreMatches) {
            $films_filtered[] = $film;
        }
    }

    // Adjust the title based on the provided parameter
    if (!is_null($genre)) {
        $title .= " filtrado por categoría";
    }

    return view("films.list", ["films" => $films_filtered, "title" => $title]);
}

public function countFilms()
{
    $films = FilmController::readFilms();
    $totalFilms = count($films);

    return view('films.count', ['totalFilms' => $totalFilms]);
}

public function createFilm()
{
    $peliculaExist = FilmController::isFilm($_POST["name"]);
    $title = "Peliculas";
    $source = env('DATA_SOURCE','database');

    if($peliculaExist){
        return view('welcome',["Error" => "Esta pelicula ya existe"]);
        dd("existe");
    }else{
        $films = FilmController::readFilms();
        $film = [
            "name" => $_POST["name"],
            "country" => $_POST["country"],
            "duration" => $_POST["duration"],
            "year" => $_POST["year"],
            "genre" => $_POST["genre"],
            "img_url" => $_POST["img_url"]
        ];
        if($source === 'json'){
            $films[]= $film;
            Storage::put("/public/films.json", json_encode($films));
        dd("existe");
                }else{
                    DB::table('films')->insert($film);
                }
                $films = FilmController::readFilms();
                return view('films.list', ["films" => $films, "title" => $title]);
               
            }
    }
    

public function isFilm($nombre):bool
{
    $films = FilmController::readFilms();
   
    foreach ($films as $film) {
        if($film['name'] == $nombre){
            return true;
        }
    }
    return false;
    

}


}
