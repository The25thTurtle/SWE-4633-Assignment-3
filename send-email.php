<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method not allowed.");
}

// Retrieve and clean submitted values
$email = trim($_POST["email"] ?? "");
$ccEmail = trim($_POST["ccEmail"] ?? "");
$subject = trim($_POST["subject"] ?? "");
$message = trim($_POST["message"] ?? "");

// Server-side validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Invalid recipient email address.");
}

if ($ccEmail !== "" && !filter_var($ccEmail, FILTER_VALIDATE_EMAIL)) {
    exit("Invalid CC email address.");
}

if ($subject === "" || strlen($subject) > 255) {
    exit("Please enter a valid subject.");
}

if (strlen($message) < 20) {
    exit("Your message must contain at least 20 characters.");
}

try {
    $sql = "INSERT INTO email_submissions
            (recipient_email, cc_email, subject, message)
            VALUES (:email, :ccEmail, :subject, :message)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":email" => $email,
        ":ccEmail" => $ccEmail !== "" ? $ccEmail : null,
        ":subject" => $subject,
        ":message" => $message
    ]);

    echo "<h1>Submission Saved!</h1>";
    echo "<p>Your email submission was successfully saved.</p>";

    echo "<p>Recipient: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p>Subject: " . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . "</p>";

} catch (PDOException $e) {
    error_log("Email submission failed: " . $e->getMessage());
    http_response_code(500);
    exit("Unable to save your submission.");
}

?>