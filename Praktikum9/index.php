<?php include 'proses_index.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Daftar Buku</title>
</head>

<body>

<?php include 'nav.php'; ?>

<div class="container mt-4">
<h2>Daftar Buku</h2>

<!-- Form Pencarian -->
<form method="get" class="row g-3 mb-4">
<div class="col-md-5">
<label class="form-label">Cari Berdasarkan Judul</label>
<input type="text" class="form-control" name="judul"
value="<?= htmlspecialchars($search_judul) ?>">
</div>

<div class="col-md-3">
<label class="form-label">Cari Berdasarkan Tahun Terbit</label>
<input type="number" class="form-control" name="tahun_terbit"
value="<?= htmlspecialchars($search_tahun) ?>">
</div>

<div class="col-md-2 align-self-end">
<button type="submit" class="btn btn-primary">Cari</button>
</div>

<div class="col-md-2 align-self-end">
<a href="index.php" class="btn btn-secondary">Reset</a>
</div>
</form>

<!-- Tabel -->
<table class="table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Judul</th>
<th>Penulis</th>
<th>Tahun</th>
<th>Harga</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['judul']) ?></td>
<td><?= htmlspecialchars($row['penulis']) ?></td>
<td><?= $row['tahun_terbit'] ?></td>
<td>Rp<?= number_format($row['harga'], 2) ?></td>
<td>
<a href="form_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="proses_hapus.php?id=<?= $row['id'] ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

</div>
</body>
</html>