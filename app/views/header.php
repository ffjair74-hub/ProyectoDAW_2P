<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformers Fan Page</title>
    
    <link rel="stylesheet" href="/Proyecto_DAW/public/css/normalize.css">
    
    <link rel="stylesheet" href="/Proyecto_DAW/public/css/style.css">

    <?php 
    $url = $_GET['url'] ?? 'home';
    if ($url === 'sinopsis') echo '<link rel="stylesheet" href="/Proyecto_DAW/public/css/sinopsis.css">';
    if ($url === 'reparto') echo '<link rel="stylesheet" href="/Proyecto_DAW/public/css/reparto.css">';
    ?>
</head>
<body>
<header class="header">
    <nav class="nav">
        <a class="brand" href="/Proyecto_DAW/public/index.php?url=home">Transformers</a>
        
        <ul class="nav-list">
            <li><a href="/Proyecto_DAW/public/index.php?url=home">Inicio</a></li>
            <li><a href="/Proyecto_DAW/public/index.php?url=home#Galeria">Galería</a></li>
            <li><a href="/Proyecto_DAW/public/index.php?url=sinopsis">Sinopsis</a></li>
            <li><a href="/Proyecto_DAW/public/index.php?url=reparto">Reparto</a></li>
            <li><a href="/Proyecto_DAW/public/index.php?url=home#contacto">Contacto</a></li>

            <?php if(isset($_SESSION['usuario'])): ?>
                <li style="color: var(--azul-acero); font-weight: bold; margin-left: 15px;">
                    Hola, <?= htmlspecialchars($_SESSION['usuario']) ?>
                </li>
                <li><a href="/Proyecto_DAW/public/index.php?url=logout" class="btn-logout">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="/Proyecto_DAW/public/index.php?url=login">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>