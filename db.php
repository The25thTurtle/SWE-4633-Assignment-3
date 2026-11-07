
<?php

$connectionString = getenv("CUSTOMCONNSTR_AZURE_POSTGRESQL_CONNECTIONSTRING");

$settings = [];

foreach (explode(";", $connectionString) as $item) {
    if (strpos($item, "=") !== false) {
        [$key, $value] = explode("=", $item, 2);
        $settings[strtolower(trim($key))] = trim($value);
    }
}

$host = $settings["server"];
$database = $settings["database"];
$username = $settings["user id"];
$password = $settings["password"];

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