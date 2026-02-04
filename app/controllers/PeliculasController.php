<?php

class PeliculasController
{

    public function sinopsis()
    {
        require_once __DIR__ . '/../views/header.php';
        require_once __DIR__ . '/../views/peliculas/sinopsis.php';
        require_once __DIR__ . '/../views/footer.php';
    }

    public function reparto()
    {
        require_once __DIR__ . '/../views/header.php';
        require_once __DIR__ . '/../views/peliculas/reparto.php';
        require_once __DIR__ . '/../views/footer.php';
    }
}
