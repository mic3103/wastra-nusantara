<?php
session_start();
var_dump($_SESSION);
exit();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC");

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode($orders);
?>
