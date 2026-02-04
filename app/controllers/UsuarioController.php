<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController
{

    // Mostrar login
    public function mostrarLogin()
    {
        require_once __DIR__ . '/../views/usuarios/login.php';
    }

    // Procesar login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $usuario = new Usuario();
            $usuario->correo = $correo;

            $data = $usuario->buscarPorCorreo();

            if ($data && password_verify($contrasena, $data['contrasena'])) {
                session_start();
                $_SESSION['usuario'] = $data['nombre'];

                header("Location: /Proyecto_DAW/public/index.php");
                exit;
            } else {
                $error = "Correo o contraseña incorrectos";
                require_once __DIR__ . '/../views/usuarios/login.php';
            }
        }
    }

    // Mostrar registro
    public function mostrarRegistro()
    {
        require_once __DIR__ . '/../views/usuarios/registro.php';
    }

    // Procesar registro
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // En UsuarioController.php
            $usuario = new Usuario();
            $usuario->nombre = $_POST['nombre'];
            $usuario->apellido = $_POST['apellido'];
            $usuario->correo = $_POST['correo'];
            $usuario->contrasena = $_POST['contrasena']; // El nombre debe coincidir con la propiedad de la clase

            if ($usuario->registrar()) {
                echo "Registro exitoso";
            } else {
                echo "Error al registrar";
            }
        }
    }

    // Logout
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /Proyecto_DAW/public/index.php");
        exit;
    }
}
