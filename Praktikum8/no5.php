<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Praktikum 8</title>
</head>
<body>

<h2>Menu Praktikum 8</h2>

<h3>Program</h3>
<a href="?page=no1">Soal 1</a> |
<a href="?page=no2">Soal 2</a> |
<a href="?page=no3">Soal 3</a> |
<a href="?page=no4">Soal 4</a>

<br><br>

<h3>Lihat Kode</h3>
<a href="?page=kode1">Kode Soal 1</a> |
<a href="?page=kode2">Kode Soal 2</a> |
<a href="?page=kode3">Kode Soal 3</a> |
<a href="?page=kode4">Kode Soal 4</a>

<hr>

<?php
switch ($page) {

    // PROGRAM
    case 'no1':
        include 'no 1.php';
        break;
    case 'no2':
        include 'no 2.php';
        break;
    case 'no3':
        include 'no 3.php';
        break;
    case 'no4':
        include 'no4.php';
        break;

    // KODE
    case 'kode1':
        highlight_file('no 1.php');
        break;
    case 'kode2':
        highlight_file('no 2.php');
        break;
    case 'kode3':
        highlight_file('no 3.php');
        break;
    case 'kode4':
        highlight_file('no4.php');
        break;

    default:
        echo "<h3>Selamat datang di Praktikum 8</h3>";
}
?>

</body>
</html>