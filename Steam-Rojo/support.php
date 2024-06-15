


<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> Soporte </title>
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
        <header>
        <h1 src="https://th.bing.com/th/id/OIP.JxkYPsoc6barT0OmtDpALAAAAA?w=269&h=295&rs=1&pid=ImgDetMain">Soporte Técnico</h1><br>
    </header>
        <div class="support-thingy">
               
  


    <section>
        <h1>Contáctanos</h1><br>
        <p class="support-sorry">¿Necesitas ayuda? ¡Estamos aquí en casa para asistir cualquier problema!</p><br>
        <ul>
            <li><a href="7713533618">Llámanos</a></li><br>
            <li><a href="mishauwu27@gmail.com">Envíanos un correo</a></li><br>
        </ul>
    </section>
    
                <p class="support-sorry"> Si está experimentando errores con nuestra página, por favor, espere a que terminemos de hacerla. Gracias. </p>
            </div>
            <footer>
        <p>&copy; 2024 Soporte Técnico</p>
    </footer>      
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
        <body>
    
    </body>
</html>