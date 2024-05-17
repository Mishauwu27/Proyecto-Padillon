<?php
// fetch_products.php
include 'connect.php';

$result = $conn->query("SELECT * FROM products");

$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);

$conn->close();
?>
