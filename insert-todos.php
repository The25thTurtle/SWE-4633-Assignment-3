
<?php

require_once 'db.php';

$sql = "INSERT INTO todos (user_id, title, completed)
        VALUES
        (1, 'Complete Assignment 3', FALSE),
        (1, 'Test database connection', TRUE),
        (2, 'Finish login feature', FALSE)";

$pdo->exec($sql);

echo "Sample todos inserted successfully!";

?>