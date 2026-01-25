<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Belum login"]);
    exit();
}

$user_id = $_SESSION['user_id'];
$items   = $_POST['items'];
$total   = $_POST['total'];
$alamat  = $_POST['alamat'];

$stmt = $conn->prepare("INSERT INTO orders (user_id, items, total, alamat) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isis", $user_id, $items, $total, $alamat);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal menyimpan pesanan"]);
}
?>
