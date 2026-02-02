<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>

<h2>Crear Usuario</h2>

<form method="POST" action="index.php?url=usuarios/crear" class="panel-usuario">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="contraseña" placeholder="Contraseña" required>

    <button type="submit">Guardar</button>
</form>
