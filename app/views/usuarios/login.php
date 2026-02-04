<?php include __DIR__ . '/../header.php'; ?>

<section class="form-container">
    <h2>Iniciar Sesión</h2>

    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="post" action="/Proyecto_DAW/public/index.php?url=login_post">
        <div class="form-group">
            <label>Correo:</label>
            <input type="email" name="correo" required>
        </div>

        <div class="form-group" style="text-align: left; margin-bottom: 20px;">
            <label>Contraseña</label>
            <div class="password-field">
                <input type="password" name="contrasena" id="password" required>
                <span class="toggle-password" id="toggleBtn">
                    <i class="fas fa-eye" id="eyeIcon"></i>
                </span>
            </div>
        </div>

        <div class="button-group" style="display: flex; flex-direction: column; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn-primary">Iniciar Sesión</button>
            <a href="/Proyecto_DAW/public/index.php?url=home" class="btn-secondary">Volver al Inicio</a>
        </div>
    </form>

    <div class="form-footer">
        <a href="index.php?url=registro">¿No tienes cuenta? Regístrate aquí</a>
    </div>
</section>

<script>
    const passInput = document.getElementById('password');
    const toggleBtn = document.getElementById('toggleBtn');
    const eyeIcon = document.getElementById('eyeIcon');

    toggleBtn.addEventListener('click', function() {
        const isPassword = passInput.type === 'password';
        passInput.type = isPassword ? 'text' : 'password';
        
       
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>

<?php include __DIR__ . '/../footer.php'; ?> 