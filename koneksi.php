<?php

// Membuat koneksi ke database
$host = "localhost"; // Nama host
$user = "root"; // Nama pengguna
$password = ""; // Kata sandi
$database = "mhs"; // Nama database

$conn = mysqli_connect($host, $user, $password, $database);

// Mengecek apakah koneksi berhasil
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
