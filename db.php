<?php

$host = getenv("Server");
$database = getenv("Database");
$username = getenv("User ID");
$password = getenv("Password");

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