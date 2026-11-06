<?php

header("Content-Type: application/json");

try {
    require_once "db.php";

    $stmt = $pdo->query("SELECT NOW()");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        "success" => true,
        "message" => "Database connected successfully!",
        "time" => $result
    ]);

} catch (Throwable $e) {
    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Database connection failed."
    ]);
}