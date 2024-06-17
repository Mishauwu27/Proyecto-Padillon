<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> Cuenta </title>
        <style>
/* Reset de estilos básico */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilos generales */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f0f0f0;
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    font-size: 24px;
}

main {
    margin-top: 20px;
}

.profile {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 20px;
}

.profile-info {
    text-align: center;
}

.profile-info img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
}

.profile-info h2 {
    font-size: 20px;
    margin-bottom: 5px;
}

.profile-info p {
    font-size: 16px;
    color: #666;
}

.achievements, .games {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.achievements h2, .games h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

.achievements ul, .games ul {
    list-style-type: none;
    padding: 0;
}

.achievements ul li, .games ul li {
    font-size: 16px;
    margin-bottom: 5px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
}

        </style>
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
            <nav class="nav-links">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <a href="account.php"> Mi Cuenta </a>
                    <a href="logout.php"> Cerrar Sesión </a>
                <?php else: ?>
                    <a href="login.html"> Iniciar Sesión </a>
                <?php endif; ?>
            </nav>
        </header>
        <main>
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

<header>
        <div class="container">
            <h1>Mi Perfil - Steam</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <section class="profile">
                <div class="profile-info">
                    <img src="profile-picture.jpg" alt="Mi Foto de Perfil">
                    <h2>Nombre de Usuario</h2>
                    <p>Correo Electrónico: usuario@ejemplo.com</p>
                </div>
                <div class="achievements">
                    <h2>Mis Logros</h2>
                    <ul>
                        <li>Logro 1</li>
                        <li>Logro 2</li>
                        <li>Logro 3</li>
                        <!-- Puedes añadir más logros -->
                    </ul>
                </div>
                <div class="games">
                    <h2>Mis Juegos</h2>
                    <ul>
                        <li>Juego 1</li>
                        <li>Juego 2</li>
                        <li>Juego 3</li>
                        <!-- Puedes añadir más juegos -->
                    </ul>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Steam. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
