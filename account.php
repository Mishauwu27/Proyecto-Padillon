<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.html');
    exit;
}

$server = "localhost";
$username = "id22362985_root";
$password = "communistSteam234_";
$database = "id22362985_steam_rojo";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['user_id'];
$logged_in_user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $viewed_user_id = intval($_GET['id']);
} else {
    $viewed_user_id = $user_id;
}

$user_stmt = $conn->prepare("SELECT username, profile_picture, background_picture FROM users WHERE id = ?");
$user_stmt->bind_param("i", $viewed_user_id);
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$user = $user_result->fetch_assoc();
$username = $user['username'] ?? '';
$background_picture = $user['background_picture'] ?? '';

$games_stmt = $conn->prepare("SELECT products.id, products.title, products.description, products.banner_path, products.image_path FROM owned_games JOIN products ON owned_games.game_id = products.id WHERE owned_games.user_id = ?");
$games_stmt->bind_param("i", $viewed_user_id);
$games_stmt->execute();
$games_result = $games_stmt->get_result();

$conn->close();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleAccount.css">
        <link rel="icon" href="logogo.png">
        <title>Cuenta</title>
        <style>
            <?php if (!empty($background_picture)): ?>
                body {
                    background: url('<?php echo htmlspecialchars($background_picture); ?>') no-repeat center center fixed;
                    background-size: cover;
                }
            <?php endif; ?>
        </style>
    </head>
    <body>
        <?php if (!empty($background_picture)): ?>
            <div class="background-overlay"></div>
        <?php endif; ?>
        <header>
            <div class="logo-container">
                <img src="logogo.png" alt="Logo" class="logo">
                <h2 class="page-name">Steam Rojo</h2>
            </div>
            <nav class="nav-links">
                <a href="index.php">Tienda</a>
                <a href="about.php">Acerca De</a>
                <a href="support.php">Soporte</a>
            </nav>
            <nav class="nav-links">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <a href="account.php?id=<?php echo $logged_in_user_id; ?>">Mi Cuenta</a>
                    <a href="logout.php">Cerrar Sesión</a>
                <?php else: ?>
                    <a href="login.html">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>
        </header>
        <main>
            <?php if (!empty($background_picture)): ?>
                <div class="gradient-overlay"></div>
            <?php endif; ?>
            <div class="account-container">
                <img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="<?php echo htmlspecialchars($username); ?>" class="profile-picture">
                <h2><?php echo htmlspecialchars($username); ?></h2>
                <?php if ($logged_in_user_id == $viewed_user_id): ?>
                    <form action="changeProfilePicture.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                        <button type="submit">Cambiar Imagen de Perfil</button>
                    </form>
                    <form action="changeBackgroundPicture.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="background_picture" id="background_picture" accept="image/*">
                        <button type="submit">Cambiar Fondo de Perfil</button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="games-container">
                <h2>Juegos de <?php echo htmlspecialchars($username); ?></h2>
                <div class="owned-games">
                    <?php if ($games_result->num_rows > 0): ?>
                        <?php while ($game = $games_result->fetch_assoc()): ?>
                            <div class="game">
                                <a href="game.php?id=<?php echo htmlspecialchars($game['id']); ?>" class="game-link">
                                    <div class="game-banner" style='background-image: url("<?php echo htmlspecialchars($game["banner_path"]); ?>");'></div>
                                    <div class="game-info" style='background-image: url("<?php echo htmlspecialchars($game["image_path"]); ?>");'>
                                        <div class="game-title"><?php echo htmlspecialchars($game["title"]); ?></div>
                                        <div class="game-description"><?php echo htmlspecialchars($game["description"]); ?></div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>Este usuario no tiene juegazos</p>
                    <?php endif; ?>
                </div>
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