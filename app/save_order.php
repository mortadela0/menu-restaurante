<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["success" => false, "error" => "Invalid data"]);
    exit;
}

$file = "orders.json";

$json = file_exists($file) ? file_get_contents($file) : "[]";

$orders = json_decode($json, true);

if (!is_array($orders)) {
    $orders = [];
}

$orders[] = $data;

file_put_contents($file, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode(["success" => true]);
