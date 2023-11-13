<?php

use App\Http\Controllers\PeliculaController;
use App\Http\Middleware\TestYear;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'filmout'], function(){
    //Aquí se definirán el conjunto de rutas bajo el prefijo "filmout"
    Route::get('pelisAntiguas/{year?}',[PeliculaController::class, "listOldFilms"])->name('oldFilms');
    Route::get('pelisNuevas/{year?}',[PeliculaController::class, "listNewFilms"])->name('newFilms');
    Route::get('pelis/{year?}/{categoria?}',[PeliculaController::class, "listFilms"])->name('listFilms');
});