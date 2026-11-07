
<?php

require_once 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS todos (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL,
    title VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT FALSE
)";

$pdo->exec($sql);

echo "Todos table created successfully!";

?>