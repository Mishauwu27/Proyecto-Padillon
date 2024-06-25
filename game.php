<?php
session_start();

$server = "localhost";
$username = "id22362985_root";
$password = "communistSteam234_";
$database = "id22362985_steam_rojo";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $game_id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT title, description, background_path, banner_path, image_path, advanced_description FROM products WHERE id = ?");
    $stmt->bind_param("i", $game_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $game = $result->fetch_assoc();
    } else {
        die("Game not found.");
    }

    $stmt->close();

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $owns_game = false;

    if ($user_id) {
        $stmt = $conn->prepare("SELECT * FROM owned_games WHERE user_id = ? AND game_id = ?");
        $stmt->bind_param("ii", $user_id, $game_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $owns_game = true;
        }

        $stmt->close();
    }
} else {
    die("Invalid game ID.");
}

$conn->close();
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($game['title']); ?></title>
    <link rel="stylesheet" href="styleStoree.css">
    <link rel="icon" href="logogo.png">
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
                <a href="account.php?id=<?php echo $user_id; ?>"> Mi Cuenta </a>
                <a href="logout.php"> Cerrar Sesión </a>
            <?php else: ?>
                <a href="login.html"> Iniciar Sesión </a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <div class="game-container">
            <div class="gallery">
                <img src="<?php echo htmlspecialchars($game['image_path']); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" class="image">
            </div>
            <div class="info">
                <h2><?php echo htmlspecialchars($game['title']); ?></h2>
                <img src="<?php echo htmlspecialchars($game['banner_path']); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" class="banner">
                <p><?php echo htmlspecialchars($game['advanced_description']); ?></p>
            </div>
        </div>
        <div class="buy-container">
            <h3> Comprar <?php echo htmlspecialchars($game['title']); ?> </h3>
            <?php if ($user_id): ?>
                <?php if ($owns_game): ?>
                    <p>Ya posees este juegazo</p>
                <?php else: ?>
                    <form action="purchaseGame.php" method="post">
                        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
                        <button type="submit">Comprar</button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <p><a href="login.html">Inicia sesión</a> para comprar este producto</p>
            <?php endif; ?>
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
