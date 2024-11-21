<?php
// Konfigurasi database
$host = 'localhost'; // Host server
$user = 'root';      // Username default XAMPP
$password = '';      // Password default XAMPP
$database = 'foto';  // Nama database kamu

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>