<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> Tienda </title>
    </head>
    <body>
        <header>
            <div class="logo-container">
                <img src="logo.png" alt="Logo" class="logo">
                <h2 class="page-name"> Steam Rojo </h2>
            </div>
            <nav class="nav-links">
                <a href="store.php"> Tienda </a>
                <a href="about.php"> Acerca De </a>
                <a href="support.php"> Soporte </a>
            </nav>
            <div class="account">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <a href="account.html" id="account-link"> Mi Cuenta </a>
                    <a href="logout.php" id="logout-link"> Cerrar Sesión </a>
                <?php else: ?>
                    <a href="login.html" id="login-link"> Iniciar Sesión </a>
                <?php endif; ?>
            </div>
        </header>
        <main>
            <div class="store-container">
                <section class="store-product">
                    <h2> Hollow Knight: Silksong </h2>
                </section>
                <section class="store-product">
                    <h2> Jailo: Di Master Chif Colektion </h2>
                </section>
                <section class="store-product">
                    <h2> Asasins Crid </h2>
                </section>
                <section class="store-product">
                    <h2> Kopjed </h2>
                </section>
                <section class="store-product">
                    <h2> Estardiu Bali </h2>
                </section>
                <section class="store-product">
                    <h2> Portal 3 </h2>
                </section>
            </div>
            <div class="store-message">
                <p class="store-thanks"> Estamos trabajando duro para traerle todos estos asombrosos juegos y más tan pronto como sea posible! Gracias por usar Steam Rojo! </p>
            </div>
        </main>
        <script>
            const currentPath = window.location.pathname.split('/').pop();
            const links = document.querySelectorAll('.nav-links a');

            links.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        </script>
    </body>
</html>