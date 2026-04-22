<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $conn->begin_transaction();

    try {
        $pelanggan_id = (int) $_POST['pelanggan_id'];
        $tanggal_pesanan = date('Y-m-d');
        $total_harga = 0;

        // Insert pesanan
        $stmt = $conn->prepare("INSERT INTO pesanan (tanggal_pesanan, pelanggan_id, total_harga) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $tanggal_pesanan, $pelanggan_id, $total_harga);
        $stmt->execute();
        $pesanan_id = $conn->insert_id;
        $stmt->close();

        // Loop buku
        foreach ($_POST['buku'] as $buku) {

            $buku_id = (int) $buku['id'];
            $kuantitas = (int) $buku['kuantitas'];

            if ($kuantitas <= 0) continue;

            // Ambil harga & stok
            $stmt = $conn->prepare("SELECT harga, stok FROM buku WHERE id = ?");
            $stmt->bind_param("i", $buku_id);
            $stmt->execute();
            $stmt->bind_result($harga_per_satuan, $stok);

            if (!$stmt->fetch()) {
                throw new Exception("Buku tidak ditemukan (ID: $buku_id)");
            }
            $stmt->close();

            if ($stok < $kuantitas) {
                throw new Exception("Stok buku ID $buku_id tidak cukup");
            }

            // Insert detail
            $stmt = $conn->prepare("INSERT INTO detail_pesanan (pesanan_id, buku_id, kuantitas, harga_per_satuan) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $pesanan_id, $buku_id, $kuantitas, $harga_per_satuan);
            $stmt->execute();
            $stmt->close();

            // Hitung total
            $total_harga += $kuantitas * $harga_per_satuan;

            // Update stok
            $stmt = $conn->prepare("UPDATE buku SET stok = stok - ? WHERE id = ?");
            $stmt->bind_param("ii", $kuantitas, $buku_id);
            $stmt->execute();
            $stmt->close();
        }

        // Update total harga
        $stmt = $conn->prepare("UPDATE pesanan SET total_harga = ? WHERE id = ?");
        $stmt->bind_param("di", $total_harga, $pesanan_id);
        $stmt->execute();
        $stmt->close();

        $conn->commit();

        header("Location: transaksi.php?message=" . urlencode("Pesanan berhasil dibuat"));
        exit;

    } catch (Exception $e) {

        $conn->rollback();

        header("Location: transaksi.php?message=" . urlencode("Gagal: " . $e->getMessage()));
        exit;
    }
}
?>  