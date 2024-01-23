<!-- resources/views/nombre_de_tu_vista.blade.php -->

@extends('layouts.master')

@section('title', 'Total de Películas')

@section('content')

    <h1>Total de Películas</h1>
    <p>El número total de películas es: {{ $totalFilms }}</p>

@endsection
