<!-- resources/views/layouts/header.blade.php -->

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Movies List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/oldFilms">Pelis antiguas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/newFilms">Pelis nuevas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/filmsByYear">Pelis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/sortFilms">Pelis en orden descendente por año</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/countFilms">Total de peliculas</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
