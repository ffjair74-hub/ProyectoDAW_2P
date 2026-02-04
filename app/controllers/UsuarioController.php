<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController
{

    // Mostrar login
    public function mostrarLogin()
    {
        require_once __DIR__ . '/../views/usuarios/login.php';
    }

    //Función login()
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $usuario = new Usuario();
            $usuario->correo = $correo;
            $data = $usuario->buscarPorCorreo();

            // CAMBIO: Comparamos las contraseñas directamente
            if ($data && $contrasena == $data['contrasena']) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['usuario'] = $data['nombre'];
                $_SESSION['correo'] = $data['correo'];

                header("Location: /Proyecto_DAW/public/index.php?url=home");
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
            $usuario = new Usuario();
            $usuario->nombre = $_POST['nombre'];
            $usuario->apellido = $_POST['apellido'];
            $usuario->correo = $_POST['correo'];
            $usuario->contrasena = $_POST['contrasena'];

            // VALIDACIÓN: ¿Ya existe el correo?
            if ($usuario->existeCorreo()) {
                $error = "Este correo ya está registrado. Intenta con otro o inicia sesión.";
                require_once __DIR__ . '/../views/usuarios/registro.php';
                return; // Detenemos el proceso
            }

            if ($usuario->registrar()) {
                header("Location: /Proyecto_DAW/public/index.php?url=login&registrado=1");
                exit;
            } else {
                $error = "Error al registrar el usuario";
                require_once __DIR__ . '/../views/usuarios/registro.php';
            }
        }
    }

    // Logout
    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset(); // Limpia las variables
        session_destroy(); // Destruye la sesión

        // Redirige explícitamente al home para que el router cargue la vista inicial
        header("Location: /Proyecto_DAW/public/index.php?url=home");
        exit;
    }

    // 1. Para mostrar el formulario de perfil
    public function mostrarPerfil()
    {
        // 1. Buscamos los datos del usuario usando el correo de la sesión
        $u = new Usuario();
        $u->correo = $_SESSION['correo'];
        $datos = $u->buscarPorCorreo();

        // 2. Cargamos la vista pasándole la variable $datos
        require_once __DIR__ . '/../views/usuarios/perfil.php';
    }

    public function actualizarPerfil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $u = new Usuario();
            $u->nombre = $_POST['nombre'];
            $u->apellido = $_POST['apellido'];
            $u->correo = $_SESSION['correo']; // Usamos el correo de la sesión para identificarlo

            if ($u->actualizar()) {
                $_SESSION['usuario'] = $u->nombre; // Actualizamos el nombre en el header
                header("Location: /Proyecto_DAW/public/index.php?url=home&actualizado=1");
                exit;
            } else {
                echo "Error al actualizar los datos.";
            }
        }
    }

    public function eliminarCuenta()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['correo'])) {
            $u = new Usuario();
            $u->correo = $_SESSION['correo'];

            if ($u->eliminar()) {
                // 1. Limpiamos la sesión por completo
                session_unset();
                session_destroy();

                // 2. Redirigimos al inicio con un mensaje de éxito
                header("Location: /Proyecto_DAW/public/index.php?url=home&eliminado=1");
                exit;
            } else {
                // Si algo falla, lo mandamos al perfil con error
                header("Location: /Proyecto_DAW/public/index.php?url=perfil&error=1");
                exit;
            }
        }
    }
}
