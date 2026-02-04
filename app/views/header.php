<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformers Fan Page</title>
    <link rel="stylesheet" href="/Proyecto_DAW/public/css/style.css">
</head>
<body>
<header class="header">
    <nav class="nav">
        <a class="brand" href="/Proyecto_DAW/public/index.php">Transformers</a>
        <ul class="nav-list">
            <li><a href="/Proyecto_DAW/public/index.php">Inicio</a></li>
            <li><a href="/Proyecto_DAW/public/index.php#Galeria">Galería</a></li>
            <li><a href="/Proyecto_DAW/public/index.php?url=sinopsis">Sinopsis</a></li>
            <li><a href="/Proyecto_DAW/public/index.php?url=reparto">Reparto</a></li>
            <li><a href="/Proyecto_DAW/public/index.php#contacto">Contacto</a></li>

            <?php if(isset($_SESSION['usuario'])): ?>
                <li style="color: #00d4ff; font-weight: bold;">Hola, <?= htmlspecialchars($_SESSION['usuario']) ?></li>
                <li><a href="/Proyecto_DAW/public/index.php?url=logout">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="/Proyecto_DAW/public/index.php?url=login">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>