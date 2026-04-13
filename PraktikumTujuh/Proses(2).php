<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $npm       = $_POST['npm'];
    $nama      = strtoupper($_POST['nama']); // Mengubah ke huruf kapital sesuai gambar
    $prodi     = strtoupper($_POST['prodi']);
    $semester  = (int)$_POST['semester'];
    $biaya_ukt = (int)$_POST['biaya_ukt'];

    // --- LOGIKA DISKON (OTOMATIS DITENTUKAN OLEH IF) ---
    $diskon_persen = 0;

    if ($biaya_ukt >= 5000000) {
        if ($semester > 8) {
            $diskon_persen = 15; // Syarat C: UKT >= 5jt DAN Semester > 8
        } else {
            $diskon_persen = 10; // Syarat B: UKT >= 5jt
        }
    } else {
        $diskon_persen = 0; // Jika di bawah 5jt tidak dapat diskon
    }

    // Perhitungan matematika
    $nilai_diskon = ($diskon_persen / 100) * $biaya_ukt;
    $total_bayar  = $biaya_ukt - $nilai_diskon;

    // Format tampilan mata uang
    $format_ukt   = "Rp. " . number_format($biaya_ukt, 0, ',', '.') . ",-";
    $format_bayar = "Rp. " . number_format($total_bayar, 0, ',', '.') . ",-";

    // --- OUTPUT LUARAN ---
    echo "<h3>Luaran yang diharuskan</h3>";
    echo "<hr width='300' align='left'>";
    echo "NPM : " . $npm . "<br>";
    echo "NAMA : " . $nama . "<br>";
    echo "PRODI : " . $prodi . "<br>";
    echo "SEMESTER : " . $semester . "<br>";
    echo "BIAYA UKT : " . $format_ukt . "<br>";
    echo "DISKON : " . $diskon_persen . "% (otomatis ditentukan oleh if)<br>";
    echo "YANG HARUS DIBAYAR : " . $format_bayar . " (otomatis ditentukan oleh if)<br>";
    echo "<br><a href='index.php'>&laquo; Kembali</a>";

} else {
    // Jika mencoba akses langsung file proses.php tanpa lewat form
    header("Location: index.php");
}
?>