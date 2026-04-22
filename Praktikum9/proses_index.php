<?php
include 'koneksi.php';

// Inisialisasi variabel pencarian
$search_judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$search_tahun = isset($_GET['tahun_terbit']) ? $_GET['tahun_terbit'] : '';

// Query dasar
$query = "SELECT * FROM buku WHERE 1=1";

// Filter judul
if (!empty($search_judul)) {
    $query .= " AND judul LIKE '%" . $conn->real_escape_string($search_judul) . "%'";
}

// Filter tahun
if (!empty($search_tahun)) {
    $query .= " AND tahun_terbit = " . $conn->real_escape_string($search_tahun);
}

$result = $conn->query($query);
?>