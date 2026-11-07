<?php

require_once 'db.php';

header('Content-Type: application/json');

try {
    $sql = "SELECT id, user_id, title, completed FROM todos ORDER BY id";

    $stmt = $pdo->query($sql);

    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($todos);

} catch (PDOException $e) {
    error_log("Todo retrieval failed: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["error" => "Unable to retrieve todos."]);
}

?>
