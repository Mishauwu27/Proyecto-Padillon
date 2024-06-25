<?php

$server = "localhost";
$username = "id22362985_root";
$password = "communistSteam234_";
$database = "id22362985_steam_rojo";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, background_path, title, description FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<a href='game.php?id=" . $row['id'] . "'>";
        echo "<section class='store-product' style='background-image: url(\"" . $row["background_path"] . "\");'>";
        echo "<div class='content'>";
        echo "<div class='title'>" . $row["title"] . "</div>";
        echo "<div class='description'>" . $row["description"] . "</div>";
        echo "</div>";
        echo "</section>";
        echo "</a>";
    }
}

$conn->close();
?>