<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$file = __DIR__ . "/orders.json";

if (!file_exists($file)) {
    echo json_encode(["error" => "Archivo orders.json no encontrado"]);
    exit;
}

$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) $data = [];

$filtered = array_filter($data, fn($o) => $o["status"] !== "completado");

file_put_contents($file, json_encode(array_values($filtered), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode(["success" => true, "message" => "Órdenes completadas eliminadas"]);
?>
