<!-- resources/views/nombre_de_tu_vista.blade.php -->

@extends('layouts.master')

@section('title', 'Total de Actores')

@section('content')

    <h1>Total de Actores</h1>
    <p>El número total de Actores es: {{ $actors }}</p>

@endsection
