<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="adc.css">
        <link rel="icon" href="logogo.png">
        <title> Soporte </title>
    </head>
    <body>
        <header>
            <div class="logo-container">
                <img src="logogo.png" alt="Logo" class="logo">
                <h2 class="page-name"> Steam Rojo </h2>
            </div>
            <nav class="nav-links">
                <a href="index.php"> Tienda </a>
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
            <div class="support-thingy">
                <h2>Soporte de Steam Rojo</h2>
                <p>En donde no solucionamos nada, pero nos vemos bien intentándolo</p>
            </div>
    
            <h3>FAQs</h3>
            <div class="support-faq">
                <h4>¿Qué es Steam Rojo?</h4>
                <p>Es como Steam, pero rojo. Y un proyecto para una materia también</p>
            </div>
            <div class="support-faq">
                <h4>¿Puedo realmente comprar juegos aquí?</h4>
                <p>No, pero puedes soñar. ¿Por qué no pruebas en el <a href="https://store.steampowered.com/">sitio</a> de nuestro rival?</p>
            </div>
            <div class="support-faq">
                <h4>¿Cómo puedo obtener soporte de verdad?</h4>
                <p>Si nos encontramos alguna vez en la vida real, ¡no dudes en preguntar!</p>
            </div>
            <div class="support-tips">
                <h3>Pro Tips Insanos</h3>
            <ul>
                <li><strong>Reinicia tu computadora:</strong> No resolverá nada, pero te hará sentir mejor.</li>
                <li><strong>Ponte a chambear:</strong> Si te dan mucho tiempo para algo, por algo será.</li>
                <li><strong>No menciones a /b:</strong>...simplemente no lo hagas...</li>
            </ul>
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
        <body>
    
    </body>
</html>