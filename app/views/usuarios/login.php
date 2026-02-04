<?php include __DIR__ . '/../header.php'; ?>

<h2>Iniciar Sesión</h2>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post" action="/Proyecto_DAW/public/index.php?url=login_post">
    <label>Correo:</label>
    <input type="email" name="correo" required>
    <label>Contraseña:</label>
    <input type="password" name="contrasena" required>
    <button type="submit">Iniciar Sesión</button>
</form>

<a href="index.php?url=registro">¿No tienes cuenta? Regístrate</a>


<?php include __DIR__ . '/../footer.php'; ?>
