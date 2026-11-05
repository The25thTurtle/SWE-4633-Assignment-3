<?php

$host = getenv("DB_HOST");
$database = getenv("DB_NAME");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");

try {

    $pdo = new PDO(
        "pgsql:host=$host;port=5432;dbname=$database;sslmode=require",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    error_log("Database connection failed: " . $e->getMessage());

    http_response_code(500);
    exit("Unable to connect to the database.");

}
?>