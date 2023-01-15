<?php
date_default_timezone_set('Asia/Jakarta');
$host = 'localhost';
$user = 'root';
$pass = 'adminroot';
$db = 'inv_db';

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    die();
} else {
    // echo "Koneksi database Berhasi.";
    // mysqli_close($conn);
}
