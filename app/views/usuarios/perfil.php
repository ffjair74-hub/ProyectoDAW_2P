<?php include __DIR__ . '/../header.php'; ?>

<section class="login-section">
    <div class="login-container">
        <h2>Mi Perfil</h2>
        <p class="descripcion-registro">Actualiza tus datos de Autobot</p>

        <form action="/Proyecto_DAW/public/index.php?url=perfil_update" method="POST" class="login-form">
            <div class="form-group" style="text-align: left;">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($datos['nombre']) ?>" required>
            </div>
            
            <div class="form-group" style="text-align: left;">
                <label>Apellido</label>
                <input type="text" name="apellido" value="<?= htmlspecialchars($datos['apellido']) ?>" required>
            </div>

            <div class="form-group" style="text-align: left;">
                <label>Contraseña</label>
                <div class="password-field">
                    <input type="password" name="contrasena" id="password" value="<?= htmlspecialchars($datos['contrasena'] ?? '') ?>" required>
                    <span class="toggle-password" id="toggleBtn">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <div class="form-group" style="text-align: left;">
                <label>Correo (No editable)</label>
                <input type="email" value="<?= htmlspecialchars($datos['correo']) ?>" disabled style="opacity: 0.5; cursor: not-allowed;">
            </div>

            <button type="submit" class="btn-login">Guardar Cambios</button>
        </form>

        <hr style="border: 0; border-top: 1px solid var(--borde); margin: 25px 0;">

        <form action="/Proyecto_DAW/public/index.php?url=eliminar_cuenta" method="POST" 
              onsubmit="return confirm('¿Estás totalmente seguro? Esta acción eliminará tu cuenta de la resistencia permanentemente.');">
            <button type="submit" class="btn-delete">
                <i class="fas fa-trash-alt"></i> Eliminar cuenta
            </button>
        </form>

        <div class="form-footer">
            <a href="/Proyecto_DAW/public/index.php?url=home">Volver al Inicio</a>
        </div>
    </div>
</section>

<script>
    // Lógica para mostrar/ocultar contraseña
    const passInput = document.getElementById('password');
    const toggleBtn = document.getElementById('toggleBtn');
    const eyeIcon = document.getElementById('eyeIcon');

    toggleBtn.addEventListener('click', () => {
        if (passInput.type === 'password') {
            passInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>

<?php include __DIR__ . '/../home/footer.php'; ?>