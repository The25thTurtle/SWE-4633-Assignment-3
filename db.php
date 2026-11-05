<?php

$host = getenv("client-server-app-server");
$database = getenv("client-server-app-database");
$username = getenv("hypukergib");
$password = getenv("$qWIpVSGGRb8QDS3");

try {

    $pdo = new PDO(
    "pgsql:host=$host;port=5432;dbname=$database;sslmode=require",
    $username,
    $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXECEPTION);

    echo "Database connection successful!";

}   catch (PDOException $e) {

        error_log("Database connection failed: " . $e->getMessage());

        http_response_code(500);
        echo "Unable to connect to the database.";

}
?>