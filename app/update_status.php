<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$id = $data["id"] ?? null;
$newStatus = $data["status"] ?? null;

if (!$id || !$newStatus) {
    echo json_encode(["success" => false, "error" => "missing parameters"]);
    exit;
}

$ordersFile = "orders.json";
$json = file_get_contents($ordersFile);
$orders = json_decode($json, true);

if (!is_array($orders)) {
    echo json_encode(["success" => false, "error" => "missing orders"]);
    exit;
}

$found = false;

foreach ($orders as &$order) {
    if ($order["id"] === $id) {
        $order["status"] = $newStatus;
        $found = true;
        break;
    }
}

if (!$found) {
    echo json_encode(["success" => false, "error" => "order not found"]);
    exit;
}

file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode(["success" => true]);
