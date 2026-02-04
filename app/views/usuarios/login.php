<?php include __DIR__ . '/../header.php'; ?>

<section class="form-container">
    <h2>Iniciar Sesión</h2>
    
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    
    <form method="post" action="/Proyecto_DAW/public/index.php?url=login_post">
        <div class="form-group">
            <label>Correo:</label>
            <input type="email" name="correo" required>
        </div>
        
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn-primary">Iniciar Sesión</button>
            <a href="/Proyecto_DAW/public/index.php?url=home" class="btn-secondary">Volver al Inicio</a>
        </div>
    </form>

    <div class="form-footer">
        <a href="index.php?url=registro">¿No tienes cuenta? Regístrate aquí</a>
    </div>
</section>

<?php include __DIR__ . '/../footer.php'; ?>
