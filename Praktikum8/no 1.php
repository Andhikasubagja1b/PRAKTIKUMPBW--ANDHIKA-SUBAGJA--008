<!DOCTYPE html>
<html>
<head>
    <title>No 1 - Switch Kendaraan</title>
</head>
<body>

<h2>Menentukan Jenis Kendaraan</h2>

<form method="GET">
    Jumlah roda:
    <input type="number" name="roda" required>
    <button type="submit">Cek</button>
</form>

<?php
if (isset($_GET['roda'])) {
    $roda = $_GET['roda'];

    switch ($roda) {
        case 1:
            echo "Sepeda satu roda";
            break;
        case 2:
            echo "Sepeda / Motor";
            break;
        case 3:
            echo "Becak / Bajaj";
            break;
        case 4:
            echo "Mobil";
            break;
        case 6:
            echo "Truk kecil";
            break;
        case 8:
            echo "Truk besar";
            break;
        default:
            echo "Tidak diketahui";
    }
}
?>

</body>
</html>