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
                <a href=store/silksong.php>
                    <section class="store-product" style="background-image: url('assets/silksong.jpg');">
                    </section>
                </a>
                <a href=store/jailo.php>
                    <section class="store-product" style="background-image: url('assets/jailo.png');">
                    </section>
                </a>
                <a href=store/asasins-crid.php>
                    <section class="store-product" style="background-image: url('assets/asasins_crid.jpeg');">
                    </section>
                </a>
                <a href=store/kopjed.php>
                    <section class="store-product" style="background-image: url('assets/kopjed.jpeg');">
                    </section>
                </a>
                <a href=store/estardiu-bali.php>
                    <section class="store-product" style="background-image: url('assets/estardiu_bali.jpeg');">
                    </section>
                </a>
                <a href=store/portal-iii.php>
                    <section class="store-product" style="background-image: url('assets/portal_iii.jpg');">
                    </section>
                </a>
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