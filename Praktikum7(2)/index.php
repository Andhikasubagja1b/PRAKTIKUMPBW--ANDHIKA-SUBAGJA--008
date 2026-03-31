<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form Pembayaran Mahasiswa</title>
</head>
<body>
    <h2>Input Data Pembayaran Mahasiswa</h2>
    <form action="proses.php" method="POST">
        <table>
            <tr>
                <td>NPM</td>
                <td>: <input type="text" name="npm" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>: <input type="text" name="prodi" required></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>: <input type="number" name="semester" required></td>
            </tr>
            <tr>
                <td>Biaya UKT (Rp)</td>
                <td>: <input type="number" name="biaya_ukt" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Hitung Diskon</button></td>
            </tr>
        </table>
    </form>
</body>
</html>