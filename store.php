<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="logogo.png">
        <title> Tienda </title>
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
            <div class="store-container">
                <?php include 'getProducts.php'; ?>
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