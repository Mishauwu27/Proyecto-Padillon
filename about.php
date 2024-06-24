<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="logogo.png">
        <title> Acerca De </title>
    </head>
    <body>
        <header>
            <div class="logo-container">
                <img src="logogo.png" alt="Logo" class="logo">
                <h2 class="page-name"> Steam Rojo </h2>
            </div>
            <nav class="nav-links">
                <a href="store.php"> Tienda </a>
                <a href="about.php"> Acerca De </a>
                <a href="support.php"> Soporte </a>
            </nav>
            <nav class="nav-links">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <?php $user_id = $_SESSION['user_id']; ?>
                    <a href="account.php?id=<?php echo $user_id; ?>"> Mi Cuenta </a>
                    <a href="logout.php"> Cerrar Sesión </a>
                <?php else: ?>
                    <a href="login.html"> Iniciar Sesión </a>
                <?php endif; ?>
            </nav>
        </header>
        <main>
            <div class="about-intro">
                <div class="left-side-intro">
                    <div class="logo-container">
                        <img src="logogo.png" alt="Logo" class="about-logo">
                        <h1 class="about-name"> Steam Rojo </h1>
                    </div>
                    <div class="about-description">
                        <p> Steam Rojo es el mejor sitio para comprar cosas inexistentes y divertirte haciéndolo </p>
                    </div>
                </div>
                <div class="right-side-intro">
                    <img src="image.jpeg" alt="Image" class="about-image">
                </div>
            </div>
            <div class="about-glow">
                <h1> Juegos alucinantes* en una sola página </h1>
                <p class="about-fact"> Más de 5 juegos para todo los gustos y un buen de <br> ofertas, Steam Rojo solo ofrece lo mejor. </p>
                <a href="store.php" class="about-link"> Echar un vistazo </a>
            </div>
            <div class="about-message">
                <p class="about-thanks"> Todas las compras que usted haga en Steam Rojo nos <br> ayudan a asegurar un mejor futuro en el hipotético caso <br> de que no aprobemos la materia. <br> Incluso cuando realmente no le cobramos nada, el hecho <br> de que este utilizando esta página significa mucho. </p>
                <p class="about-clarification"> *: alucinantes dado que al pagar vas a alucinar que te demos algún producto </p>
            </div>
        </main>
        <script>
            const currentPath = window.location.pathname.split('/').pop();
            const links = document.querySelectorAll('a');

            links.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        </script>
    </body>
</html>