<?php include __DIR__ . '/../header.php'; ?>

<?php if (isset($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<section class="login-section">
    <div class="login-container">
        <h2>Crear Cuenta</h2>
        <p class="descripcion-registro">Únete a la resistencia Autobot</p>

        <form action="/Proyecto_DAW/public/index.php?url=registro_post" method="POST" class="login-form">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="email" name="correo" placeholder="Correo" required>
            
            <div class="password-field" style="margin-bottom: 15px;">
                <input type="password" name="contrasena" id="password_reg" placeholder="Contraseña" required>
                <span class="toggle-password" id="toggleBtn_reg">
                    <i class="fas fa-eye" id="eyeIcon_reg"></i>
                </span>
            </div>
            
            <button type="submit" class="btn-login">Registrarse</button>
        </form>

        <div class="form-footer">
            <a href="/Proyecto_DAW/public/index.php?url=login">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</section>

<script>
    
    const passInputReg = document.getElementById('password_reg');
    const toggleBtnReg = document.getElementById('toggleBtn_reg');
    const eyeIconReg = document.getElementById('eyeIcon_reg');

    toggleBtnReg.addEventListener('click', function() {
        const isPassword = passInputReg.type === 'password';
        passInputReg.type = isPassword ? 'text' : 'password';
        eyeIconReg.classList.toggle('fa-eye');
        eyeIconReg.classList.toggle('fa-eye-slash');
    });
</script>

<?php include __DIR__ . '/../footer.php'; ?>