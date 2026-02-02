<?php
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController
{
    
    // LISTAR
    public function listar()
    {
        $usuarios = Usuario::obtenerTodos();
        require __DIR__ . "/../views/usuarios/listar.php";
    }

    // FORM CREAR
    public function crearForm()
    {
        require __DIR__ . "/../views/usuarios/crear.php";
    }

    // CREAR
    public function crear()
    {
        $nombre = $_POST["nombre"] ?? "";
        $apellido = $_POST["apellido"] ?? "";
        $correo = $_POST["correo"] ?? "";
        $contraseña = $_POST["contraseña"] ?? "";

        Usuario::crear($nombre, $apellido, $correo, $contraseña);

        header("Location: index.php?url=usuarios/listar");
        exit;
    }

    // FORM EDITAR
    public function editarForm()
    {
        $correo = $_GET["correo"] ?? "";
        $usuario = Usuario::obtenerPorId($correo);

        require __DIR__ . "/../views/usuarios/editar.php";
    }

    // ACTUALIZAR
    public function actualizar()
    {
        $correo = $_POST["correo"] ?? "";
        $nombre = $_POST["nombre"] ?? "";
        $apellido = $_POST["apellido"] ?? "";

        Usuario::actualizar($correo, $nombre, $apellido);

        header("Location: index.php?url=usuarios/listar");
        exit;
    }

    // ELIMINAR
    public function eliminar()
    {
        $correo = $_GET["correo"] ?? "";
        Usuario::eliminar($correo);

        header("Location: index.php?url=usuarios/listar");
        exit;
    }
}

