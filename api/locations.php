<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../data/content.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'all';
$filtered_data = array();

foreach ($map_points as $point) {
    if ($type === 'all' || $point['cat'] === $type) {
        $filtered_data[] = $point;
    }
}

echo json_encode(array("items" => $filtered_data));
?>
