<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.html');
    exit;
}

$server = "localhost";
$username = "root";
$password = "";
$database = "steam_rojo";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['game_id']) && is_numeric($_POST['game_id'])) {
    $user_id = $_SESSION['user_id'];
    $game_id = intval($_POST['game_id']);

    $stmt = $conn->prepare("INSERT INTO owned_games (user_id, game_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $game_id);

    if ($stmt->execute()) {
        header('Location: game.php?id=' . $game_id);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
