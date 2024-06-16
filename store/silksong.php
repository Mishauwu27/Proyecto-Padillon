<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <title> Hollow Knight: Silksong </title>
    </head>
    <body>
    <header>
            <div class="logo-container">
                <img src="../logo.png" alt="Logo" class="logo">
                <h2 class="page-name"> Steam Rojo </h2>
            </div>
            <nav class="nav-links">
                <a href="../store.php"> Tienda </a>
                <a href="../about.php"> Acerca De </a>
                <a href="../support.php"> Soporte </a>
            </nav>
            <nav class="nav-links">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <a href="../account.php"> Mi Cuenta </a>
                    <a href="../logout.php"> Cerrar Sesión </a>
                <?php else: ?>
                    <a href="../login.html"> Iniciar Sesión </a>
                <?php endif; ?>
            </nav>
        </header>
        <main>
            <div class="game-info">
                <div class="left-side-info">
                </div>
                <div class="right-side-info">
                </div>
            </div>
        </main>
    </body>
</html>
