<?php

require_once '../inc/connection.php';
require_once '../models/timesince.php';


$order_id = '0001';
$customer_id = 'C2301001';
$name = $greeting = '';
$date = date('Y-m-d H:i:s');
$callback = [];

if (isset($_POST)) {
    $name         = $_POST['name'];
    $greeting     = $_POST['greeting'];
    $present      = $_POST['present'];

    $query      = mysqli_query($conn, "INSERT INTO greeting(customer_id,`name`,greeting,present,created_at) VALUES('$customer_id','$name','$greeting','$present','$date')");

    if (!$query) {
        $callback = [
            'code' => 0,
            'msg' => "Faild add greeting. Please try again!" . mysqli_error($conn),
            'name' => '',
            'greeting' => '',
            'present' => '',
            'date' => '',
            'count_present' => '',
        ];
    } else {
        $sql            = "SELECT * FROM greeting where customer_id ='C2301001' and `present`='1' order by created_at DESC";
        $query          = mysqli_query($conn, $sql);
        $getGreeting    = (mysqli_fetch_all($query, MYSQLI_ASSOC));
        $dt_confirm     = $dt_unconfirm = $dt_tentative = [];
        foreach ($getGreeting as $g) {
            $dt_confirm[]       = ($g['present'] == '1') ? 1 : 0;
            $dt_unconfirm[]     = ($g['present'] == '2') ? 1 : 0;
            $dt_tentative[]     = ($g['present'] == '3') ? 1 : 0;
        }

        $count_present = [
            'getGreeting'   => count($getGreeting),
            'dt_confirm'    => array_sum($dt_confirm),
            'dt_unconfirm'  => array_sum($dt_unconfirm),
            'dt_tentative'  => array_sum($dt_tentative),

        ];

        $callback = [
            'code' => 1,
            'msg' => "Success. Your greeting has been added!",
            'name' => $name,
            'present' => $present,
            'greeting' => $greeting,
            'date' => time_since(strtotime($date)),
            'count_present' => $count_present,
        ];
    }
    echo json_encode($callback);
}
