<?php
$min = filter_input(INPUT_GET, "min");
$max = filter_input(INPUT_GET, "max");
if ($min == null) {
    $min = 0;
}
if ($max == null) {
    $max = 100;
}
$number = 50;
do {
    $number = mt_rand($min - 10, $max + 10);
} while ($number < $min || $number > $max);
header("Access-Control-Allow-Origin: *");
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: OPTIONS, GET");
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header("Content-Type: application/json");
    echo json_encode($number);
} else {
    http_response_code(405);
}



