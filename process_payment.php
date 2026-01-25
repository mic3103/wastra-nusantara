<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: loginsignup");
    exit();
}

$user_id = $_SESSION['user_id'];
$order_code = $_POST['order_code']; 
$amount = $_POST['amount'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$items = $_POST['items'] ?? '[]';

// Folder upload
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$fileName = time() . "_" . basename($_FILES["proof"]["name"]);
$targetFile = $targetDir . $fileName;
$proof = $fileName;

// Validasi tipe file
$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
if(!in_array($_FILES['proof']['type'], $allowedTypes)) {
    die("❌ Format file tidak diperbolehkan. Hanya JPG/PNG.");
}

if (move_uploaded_file($_FILES["proof"]["tmp_name"], $targetFile)) {

    $stmt = $conn->prepare("INSERT INTO payments 
    (user_id, order_code, amount, address, phone, proof, items, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");

    $stmt->bind_param("issssss", 
        $user_id, 
        $order_code, 
        $amount, 
        $address, 
        $phone, 
        $proof, 
        $items
    );


    if ($stmt->execute()) {
        header("Location: receipt.php?id=" . $stmt->insert_id);
        exit();
    } else {
        echo "❌ Gagal menyimpan data pembayaran: " . $stmt->error;
    }

} else {
    echo "❌ Upload bukti pembayaran gagal.";
}
?>
