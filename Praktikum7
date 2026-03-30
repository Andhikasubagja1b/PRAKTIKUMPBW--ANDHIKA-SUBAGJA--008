

<?php

$nilai = $_POST['nilai'];
$nama = $_POST['nama'];
$matakuliah = $_POST['matakuliah'];
$predikat = "";
$status = "";
if (empty($nama)) {
    echo "Nama tidak boleh kosong!";
}

if ($nilai >= 85 && $nilai <= 100) {
    $predikat = "A";
} else if ($nilai >= 75 && $nilai < 85) {
    $predikat = "B";
} else if ($nilai >= 65 && $nilai < 75) {
    $predikat = "C";
} else if ($nilai >= 50 && $nilai < 65) {
    $predikat = "D";
} else if ($nilai < 50) {
    $predikat = "E";
} else {
    $predikat = "Tidak valid";
}

if ($predikat == "A" || $predikat == "B" || $predikat == "C") {
    $status = "Lulus";
} else if ($predikat == "D" || $predikat == "E") {
    $status = "Tidak Lulus";
} else {
    $status = "Tidak valid";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Nilai <?php echo $nama; ?></title>
</head>
<body>
    <h1>Hasil Nilai</h1>
    <p>Nama: <?php echo $nama; ?></p>
    <p>Mata Kuliah: <?php echo $matakuliah; ?></p>
    <p>Nilai: <?php echo $nilai; ?></p>
    <p>Predikat: <?php echo $predikat; ?></p>
    <p>Status: <?php echo $status; ?></p>

    <button onclick="window.location.href='latihan_nilai.php'">Back To Form</button>
</body>
</html>