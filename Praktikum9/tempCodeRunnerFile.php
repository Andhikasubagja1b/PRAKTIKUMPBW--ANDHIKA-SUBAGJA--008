<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "latihan_db";

// Membuat koneksi
$conn = mysqli_connect("localhost", "root", "", "Praktikum9");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>