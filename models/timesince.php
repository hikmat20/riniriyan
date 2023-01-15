<?php

function time_since($original)
{
    date_default_timezone_set('Asia/Jakarta');
    $chunks = array(
        array(60 * 60 * 24 * 365, 'tahun'),
        array(60 * 60 * 24 * 30, 'bulan'),
        array(60 * 60 * 24 * 7, 'minggu'),
        array(60 * 60 * 24, 'hari'),
        array(60 * 60, 'jam'),
        array(60, 'menit'),
        array(1, 'detik'),
    );

    $today = time();
    $since = $today - $original;

    if ($since > 6084000) {
        $print = date("d F Y", $original);
        if ($since > 31536000) {
            $print .= ", " . date("Y", $original);
        }
        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0)
            break;
    }

    if ($count < 1) {
        return  $print = "Baru saja";
    } else if ($since < 86400) {
        return  $print = "$count {$name}  yang lalu";
    } else if ($since >  86400 && $since <  172800) {
        return $print = 'Kemarin ' . date("H:i:s", $original);
    } else {
        return $print = date("d F Y.H:i:s", $original);
    }
    // $print = ($count < 5) ? '1 ' . $name : "$count {$name}";
}
