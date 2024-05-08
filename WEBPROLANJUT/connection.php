<?php
// connection.php
$host = "localhost"; // Alamat IP server tempat database Anda berada
$user = "root"; // Nama user yang baru dibuat
$pass = ""; // Password untuk user yang baru dibuat
$dbname = "sqa"; // Nama database yang ingin Anda hubungi

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "";
}