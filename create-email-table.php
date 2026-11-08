<?php

require_once 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS email_submissions (
    id SERIAL PRIMARY KEY,
    recipient_email VARCHAR(255) NOT NULL,
    cc_email VARCHAR(255),
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($sql);

echo "Email submissions table created successfully!";

?>