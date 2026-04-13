<?php
$hasil = "";
if (isset($_POST['angka'])) {
    $angka = $_POST['angka'];
    $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cek Genap Ganjil</title>
</head>
<body>

<h2>Cek Angka Genap / Ganjil</h2>

<form method="POST">
    Masukkan Angka:
    <input type="number" name="angka" required>
    <button type="submit">Cek</button>
</form>

<?php
if ($hasil != "") {
    echo "<p>Angka $angka adalah <b>$hasil</b></p>";
}
?>

</body>
</html>