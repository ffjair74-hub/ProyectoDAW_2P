<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformers Fan Page</title>

    <link rel="stylesheet" href="/Proyecto_DAW/public/css/normalize.css">

    <link rel="stylesheet" href="/Proyecto_DAW/public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <?php
    $url = $_GET['url'] ?? 'home';
    if ($url === 'sinopsis') echo '<link rel="stylesheet" href="/Proyecto_DAW/public/css/sinopsis.css">';
    if ($url === 'reparto') echo '<link rel="stylesheet" href="/Proyecto_DAW/public/css/reparto.css">';
    if ($url === 'login' || $url === 'registro') echo '<link rel="stylesheet" href="/Proyecto_DAW/public/css/style.css">';
    ?>
</head>

<body>
    <header class="header">
        <nav class="nav">
            <a class="brand" href="/Proyecto_DAW/public/index.php?url=home">Transformers</a>

            <?php
            
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            ?>

            <button class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <ul class="nav-list" id="nav-list">
                <li><a href="/Proyecto_DAW/public/index.php?url=home">Inicio</a></li>
                <li><a href="/Proyecto_DAW/public/index.php?url=sinopsis">Sinopsis</a></li>
                <li><a href="/Proyecto_DAW/public/index.php?url=reparto">Reparto</a></li>

                <?php if (isset($_SESSION['usuario'])): ?>
                    <li>Hola, <?= htmlspecialchars($_SESSION['usuario']) ?></li>
                    <li><a href="index.php?url=perfil">Perfil</a></li>
                    <li><a href="index.php?url=logout">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="index.php?url=login">Iniciar Sesión</a></li>
                    <li><a href="index.php?url=registro">Registro</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>