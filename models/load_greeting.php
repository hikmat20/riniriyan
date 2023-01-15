<?php
require_once '../inc/connection.php';
require_once '../models/timesince.php';

$confirm = [
    '1' => 'Hadir',
    '2' => 'Tidak Bisa Hadir',
    '3' => 'Semoga Hadir'
];

$sql = "SELECT * FROM greeting where customer_id ='C2301001' and `status`='1' order by created_at DESC";

$query = mysqli_query($conn, $sql);
$getGreeting = (mysqli_fetch_all($query, MYSQLI_ASSOC));
foreach ($getGreeting as $greeting) :

    $bg_confirm = ($greeting['present'] == '1') ? 'bg-success' : (($greeting['present'] == '2') ? 'bg-danger' : 'bg-warning');

    echo "<div class='px-3'>
            <div class='card shadow-sm text-theme-primary' style='border-radius: 1rem; background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: cover;'>
                <div class='card-body position-relative'>
                    <div class='mb-3 px-1'>
                        <div class='mb-2 d-flex justify-content-between align-items-center'>
                            <span class='comments_name fw-bold'>" . $greeting['name'] . "</span>
                            
                        </div>
                        <p class=' text-theme-primary font-size-14 rounded-3'>
                            " . $greeting['greeting'] . "
                            <small class='text-muted font-size-10 d-block mt-2'><i>" . time_since(strtotime($greeting['created_at'])) . "</i></small>
                        </p>
                    </div>

                </div>
            </div>
        </div>";
endforeach;
