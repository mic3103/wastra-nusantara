<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $username;

        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil. Selamat datang!",
            "login" => true,
            "id" => (int)$row['id']
        ]);

    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Password salah."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Username tidak ditemukan."
    ]);
}
?>
