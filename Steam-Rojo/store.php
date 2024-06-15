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
                        <div class="content">
                            <div class="title"> Hollow Knight: Silksong </div>
                            <div class="description"> shaw </div>
                        </div>
                    </section>
                </a>
                <a href=store/jailo.php>
                    <section class="store-product" style="background-image: url('assets/jailo.png');">
                        <div class="content">
                            <div class="title"> Jailo: Di Master Chif Colektion </div>
                            <div class="description"> El emblemático viaje del Jefe Maestro incluye seis juegos creados para PC y recopilados en una sola experiencia. Ya seas un seguidor de toda la vida o descubras al Spartan 117 por primera vez, la colección Jefe Maestro te resultará la experiencia de juego definitiva de Halo. </div>
                        </div>
                    </section>
                </a>
                <a href=store/asasins-crid.php>
                    <section class="store-product" style="background-image: url('assets/asasins_crid.jpeg');">
                        <div class="content">
                            <div class="title"> Asasins Crid </div>
                            <div class="description"> Estamos en el año 1191 d.C., y la Tercera Cruzada está asolando la Tierra Santa. Tú, Altair, intentarás poner fin a las hostilidades eliminando ambas partes del conflicto. Eres un Asesino, un guerrero envuelto en un halo de misterio y temido por tu crueldad. Tus acciones pueden sembrar el caos en tu entorno más cercano y tu existencia dará forma a los acontecimientos durante este momento clave de la historia. </div>
                        </div>
                    </section>
                </a>
                <a href=store/kopjed.php>
                    <section class="store-product" style="background-image: url('assets/kopjed.jpeg');">
                        <div class="content">
                            <div class="title"> Kopjed </div>
                            <div class="description"> Cuphead es un juego de acción clásico estilo "dispara y corre" que se centra en combates contra el jefe. Inspirado en los dibujos animados de los años 30, los aspectos visual y sonoro están diseñados con esmero empleando las mismas técnicas de la época, es decir, animación tradicional a mano, fondos de acuarela y grabaciones originales de jazz. </div>
                        </div>
                    </section>
                </a>
                <a href=store/estardiu-bali.php>
                    <section class="store-product" style="background-image: url('assets/estardiu_bali.jpeg');">
                        <div class="content">
                            <div class="title"> Estardiu Bali </div>
                            <div class="description"> Acabas de heredar la vieja parcela agrícola de tu abuelo de Stardew Valley. Decides partir hacia una nueva vida con unas herramientas usadas y algunas monedas. ¿Te ves capaz de vivir de la tierra y convertir estos campos descuidados en un hogar próspero? </div>
                        </div>
                    </section>
                </a>
                <a href=store/portal-iii.php>
                    <section class="store-product" style="background-image: url('assets/portal_iii.jpg');">
                        <div class="content">
                            <div class="title"> Portal 3 </div>
                            <div class="description"> Valve aprendió a contar hasta 3 </div>
                        </div>
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