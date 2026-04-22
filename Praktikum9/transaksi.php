<?php
include 'koneksi.php';
include 'nav.php';

// Ambil data
$buku_result = $conn->query("SELECT id, judul FROM buku");
$pelanggan_result = $conn->query("SELECT id, nama FROM pelanggan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Buat Pesanan</title>
</head>

<body>

<div class="container mt-4">
<h2>Buat Pesanan Baru</h2>

<?php if (isset($_GET['message'])): ?>
<div class="alert alert-info">
<?= htmlspecialchars($_GET['message']) ?>
</div>
<?php endif; ?>

<form method="post" action="proses_transaksi.php">

<!-- PILIH PELANGGAN -->
<div class="mb-3">
<label class="form-label">Pilih Pelanggan</label>
<select class="form-select" name="pelanggan_id" required>
<option value="">Pilih Pelanggan</option>

<?php while ($row = $pelanggan_result->fetch_assoc()): ?>
<option value="<?= $row['id'] ?>">
<?= $row['nama'] ?>
</option>
<?php endwhile; ?>

</select>
</div>

<!-- PILIH BUKU -->
<h3>Daftar Buku</h3>

<div class="mb-3">
<label class="form-label">Pilih Buku</label>
<select class="form-select" name="buku[0][id]" required>
<option value="">Pilih Buku</option>

<?php while ($row = $buku_result->fetch_assoc()): ?>
<option value="<?= $row['id'] ?>">
<?= $row['judul'] ?>
</option>
<?php endwhile; ?>

</select>
</div>

<!-- JUMLAH -->
<div class="mb-3">
<label class="form-label">Jumlah Buku</label>
<input type="number" class="form-control" name="buku[0][kuantitas]" required>
</div>

<button type="submit" class="btn btn-primary">Buat Pesanan</button>

</form>
</div>

</body>
</html>