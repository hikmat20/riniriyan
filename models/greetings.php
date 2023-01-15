<?php
require_once 'inc/connection.php';
require_once 'models/timesince.php';

$confirm = [
    '1' => 'Hadir',
    '2' => 'Tidak Bisa Hadir',
    '3' => 'Semoga Hadir'
];

$sql = "SELECT * FROM greeting where customer_id ='C2301001' order by created_at DESC";

$query = mysqli_query($conn, $sql);
$getGreeting = (mysqli_fetch_all($query, MYSQLI_ASSOC));
$dt_confirm = $dt_unconfirm = $dt_tentative = [];
foreach ($getGreeting as $g) {
    $dt_confirm[] = ($g['present'] == '1') ? 1 : 0;
    $dt_unconfirm[] = ($g['present'] == '2') ? 1 : 0;
    $dt_tentative[] = ($g['present'] == '3') ? 1 : 0;
}
