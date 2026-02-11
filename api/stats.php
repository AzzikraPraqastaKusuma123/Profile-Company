<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../data/content.php';

$stats = array(
    "all" => count($map_points),
    "offices" => 0,
    "line_stations" => 0,
    "engine_hubs" => 0,
    "hangxin_bases" => 0
);

foreach ($map_points as $point) {
    if (isset($stats[$point['cat']])) {
        $stats[$point['cat']]++;
    }
}

echo json_encode($stats);
?>
