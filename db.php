<?php
$host = "localhost";
$user = "u376009599_wastra";
$pass = "Wastramilikindonesia1708";
$db   = "u376009599_WASTRA";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>