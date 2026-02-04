<?php
session_start(); 
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/PeliculasController.php';
require_once __DIR__ . '/../app/controllers/UsuarioController.php';

$home = new HomeController();
$peliculas = new PeliculasController();
$usuario = new UsuarioController();

$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'home':
        $home->index();
        break;

    case 'sinopsis':
        $peliculas->sinopsis();
        break;

    case 'reparto':
        $peliculas->reparto();
        break;

    case 'login':
        $usuario->mostrarLogin();
        break;

    case 'login_post':
        $usuario->login();
        break;

    case 'registro':
        $usuario->mostrarRegistro();
        break;

    case 'registro_post':
        $usuario->registrar();
        break;

    case 'logout':
        $usuario->logout();
        break;

    case 'perfil':
        $usuario->mostrarPerfil();
        break;

    case 'perfil_update':
        $usuario->actualizarPerfil();
        break;

    case 'eliminar_cuenta':
        $usuario->eliminarCuenta();
        break;

    default:
        echo "Página no encontrada";
}

