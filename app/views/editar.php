<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>

<h2>Editar Usuario</h2>

<form method="POST" action="index.php?url=usuarios/actualizar" class="panel-usuario">
    <input type="hidden" name="correo" value="<?= $usuario["correo"] ?>">

    <input type="text" name="nombre" value="<?= $usuario["nombre"] ?>" required>
    <input type="text" name="apellido" value="<?= $usuario["apellido"] ?>" required>

    <button type="submit">Actualizar</button>
</form>
