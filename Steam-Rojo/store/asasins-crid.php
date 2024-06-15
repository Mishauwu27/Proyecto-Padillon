<?php
session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <title> Tienda </title>
       
       <style>
        .product-container {
            display: flex;
            align-items: center;
        }
        .product-image {
            max-width: 800px;
            margin-right:20px;
    
        }

        .product-description{
            font-size:16px;
            color:#666;
        }
        .buy-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

     
      
       </style>
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
            <div class="account">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <a href="account.html" id="account-link"> Mi Cuenta </a>
                    <a href="../logout.php" id="logout-link"> Cerrar Sesión </a>
                <?php else: ?>
                    <a href="../login.html" id="login-link"> Iniciar Sesión </a>
                <?php endif; ?>
            </div>
        </header>


        <div class="product-container">
          <img src="https://wallpaperaccess.com/full/1794728.jpg"  alt="Jueguin" class="product-image"> <br>
          <p class="product-description">Los juegos de Asassin's Creed llevan a los jugadores a distintos periodos<br> de la Historia decisivos para la humanidad, como el Renacimiento<br> Europeo, la Antigua Grecia o las cruzadas, entre otros. Todos ellos tienen <br>en común un conflicto a lo largo de los siglos entre los Asesinos y los<br> Templarios, y en la mayoría de ellos hay partes que transcurren en el presente. La mayoría de estos títulos son aventuras de sigilo o los RPG de acción en mundo abierto, aunque los hay de otros géneros.</p>

          <button class="buy-button">Comprar</button>
        </div>
       
        <div class="slider">
  <ul>
    <li><img src="https://c.wallhere.com/photos/d0/9f/Assassin's_Creed_Codename_Hexe_Assassin's_Creed_4K_Ubisoft_logo-2171693.jpg!d"
    width="250px" heigth="250px" alt="Imagen 1"></li>
    <li><img src="https://th.bing.com/th/id/R.9cbfb4aa8522e5bd19c4f5ef80ce561d?rik=DgnHR3QuUbJ3bQ&pid=ImgRaw&r=0" 
    width="250px" heigth="250px" alt="Imagen 2"></li>
    <li><img src="https://th.bing.com/th/id/OIP.Y4_mXueg2fbmyzL-840feQHaEK?rs=1&pid=ImgDetMain" 
    width="250px" heigth="250px" alt="Imagen 3"></li>
    <li><img src="https://cdn.vox-cdn.com/thumbor/p-ThC2NUSkTlXsntqOQ8nC5Z1fQ=/0x60:1920x1140/1600x900/cdn.vox-cdn.com/uploads/chorus_image/image/2294945/781.0.jpeg" 
    width="250px" heigth="250px" alt="Imagen 4"></li>
   
  </ul>
</div>
    </body>  
</html>     