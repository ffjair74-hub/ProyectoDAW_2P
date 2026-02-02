<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>

<h2>Lista de Usuarios</h2>

<div class="panel-usuario">
<table style="width:100%; border-collapse: collapse;">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($usuarios as $u): ?>
    <tr>
        <td><?= $u["nombre"] ?></td>
        <td><?= $u["apellido"] ?></td>
        <td><?= $u["correo"] ?></td>
        <td>
            <a href="index.php?url=usuarios/editarForm&correo=<?= $u["correo"] ?>">Editar</a>
            <a href="index.php?url=usuarios/eliminar&correo=<?= $u["correo"] ?>" 
               onclick="return confirm('¿Eliminar usuario?')" class="salir">
               Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
