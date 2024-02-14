<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

@extends('layouts.master')

@section('title', 'Movies List')

@section('content')
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('listActorsByDecade') }}" method="get">
            @csrf
            <label for="decade">Select Decade:</label>
            <select class="form-control" id="decade" name="decade" required>
                <option value="1970">1970</option>
                <option value="1980">1980</option>
                <option value="1990">1990</option>
                <option value="2000">2000</option>
                <option value="2010">2010</option>
                <option value="2020">2020</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    <div class="container mt-5">
        <h2>Añadir Película</h2>
        <form action="{{ route('createFilm') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="year">Año:</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="genre">Género:</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="country">País:</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="duration">Duración:</label>
                <input type="number" class="form-control" id="duration" name="duration" required>
            </div>
            <div class="form-group">
                <label for="img_url">Imagen URL:</label>
                <input type="text" class="form-control" id="img_url" name="img_url" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        @endsection
        <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- Include any additional HTML or Blade directives here -->

</body>

</html>