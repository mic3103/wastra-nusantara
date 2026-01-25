<?php
require 'db.php';

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

$hashed = password_hash($password, PASSWORD_DEFAULT);

// Cek user/email
$check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
$check->bind_param("ss", $username, $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Username atau Email sudah digunakan."
    ]);
    exit();
}

// Insert
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashed);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Pendaftaran berhasil! Silakan login."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Gagal mendaftar. Coba lagi."
    ]);
}
?>
