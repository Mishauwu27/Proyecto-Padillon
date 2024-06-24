<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "steam_rojo";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $profile_picture = $_FILES['profile_picture'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_picture["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($profile_picture["tmp_name"]);
    if ($check !== false) {
        if (file_exists($target_file)) {
            unlink($target_file);
        }
        if ($profile_picture["size"] > 5000000) {
            echo "Sorry, your file is too large.";
        } else {
            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {
                if (move_uploaded_file($profile_picture["tmp_name"], $target_file)) {
                    $sql = "UPDATE users SET profile_picture='$target_file' WHERE id=$user_id";
                    if ($conn->query($sql) === TRUE) {
                        header("Location: account.php?id=$user_id");
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}

$conn->close();
?>
