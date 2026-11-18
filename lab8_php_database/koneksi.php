<?php
$host = "localhost";
$user = "root";
$pass = "Ptrnwj2527#";
$db   = "latihan1";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn == false) {
    echo "Koneksi ke server gagal.";
    die();
}
echo "Koneksi berhasil";
?>
