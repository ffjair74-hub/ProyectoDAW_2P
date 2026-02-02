<?php
require_once __DIR__ . "/../../config/conexion.php";

class Usuario
{
    // OBTENER TODOS
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT nombre, apellido, correo, contraseña FROM usuarios";
        $res = $conn->query($sql);

        $usuarios = [];
        while ($fila = $res->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    // OBTENER POR CORREO
    public static function obtenerPorId($correo)
    {
        $conn = Conexion::conectar();
        $correo = $conn->real_escape_string($correo);

        $sql = "SELECT nombre, apellido, correo, contraseña 
                FROM usuarios 
                WHERE correo='$correo' 
                LIMIT 1";

        $res = $conn->query($sql);
        return $res->fetch_assoc(); // null si no existe
    }

    // CREAR
    public static function crear($nombre, $apellido, $correo, $contraseña)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $apellido = $conn->real_escape_string($apellido);
        $correo = $conn->real_escape_string($correo);
        $contraseña = $conn->real_escape_string($contraseña);

        $sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña)
                VALUES ('$nombre', '$apellido', '$correo', '$contraseña')";

        return $conn->query($sql);
    }

    // ACTUALIZAR
    public static function actualizar($correo, $nombre, $apellido)
    {
        $conn = Conexion::conectar();
        $correo = $conn->real_escape_string($correo);
        $nombre = $conn->real_escape_string($nombre);
        $apellido = $conn->real_escape_string($apellido);

        $sql = "UPDATE usuarios 
                SET nombre='$nombre', apellido='$apellido' 
                WHERE correo='$correo'";

        return $conn->query($sql);
    }

    // ELIMINAR
    public static function eliminar($correo)
    {
        $conn = Conexion::conectar();
        $correo = $conn->real_escape_string($correo);

        $sql = "DELETE FROM usuarios WHERE correo='$correo'";
        return $conn->query($sql);
    }
}

