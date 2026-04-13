<?php
// pajak
define("PAJAK", 0.10);

// Array 
$barang = [
    "nama"  => "Keyboard",
    "harga" => 150000
];

// From
$jumlah_beli = 0;
$total_sebelum_pajak = 0;
$pajak = 0;
$total_bayar = 0;

if(isset($_POST['jumlah'])){
    $jumlah_beli = $_POST['jumlah'];

    $total_sebelum_pajak = $barang["harga"] * $jumlah_beli;
    $pajak = $total_sebelum_pajak * PAJAK;
    $total_bayar = $total_sebelum_pajak + $pajak;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Perhitungan Total Pembelian</title>
<style>
body{
    font-family: Arial;
    background:#f5f5f5;
}
.container{
    width:500px;
    margin:50px auto;
    border:2px solid black;
    padding:20px;
    background:white;
}
h2{
    text-align:center;
}
button{
    padding:6px 12px;
}
.total{
    font-weight:bold;
}
</style>
</head>

<body>

<div class="container">
<h2>Perhitungan Total Pembelian (Dengan Array)</h2>
<hr>

<form method="post">
    Jumlah Beli :
    <input type="number" name="jumlah" required>
    <button type="submit">Hitung</button>
</form>

<br>

<?php if($jumlah_beli > 0){ ?>

<p>Nama Barang: <?php echo $barang["nama"]; ?></p>
<p>Harga Satuan: Rp <?php echo number_format($barang["harga"],0,",","."); ?></p>
<p>Jumlah Beli: <?php echo $jumlah_beli; ?></p>
<p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($total_sebelum_pajak,0,",","."); ?></p>
<p>Pajak (10%): Rp <?php echo number_format($pajak,0,",","."); ?></p>
<p class="total">Total Bayar: Rp <?php echo number_format($total_bayar,0,",","."); ?></p>

<?php } ?>

</div>

</body>
</html>