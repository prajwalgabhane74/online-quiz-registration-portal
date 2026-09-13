<?php
// Database connection.
// Replace these placeholder values with your InfinityFree MySQL credentials.
$host = "YOUR_DB_HOST";
$user = "YOUR_DB_USERNAME";
$password = "YOUR_DB_PASSWORD";
$dbname = "YOUR_DB_NAME";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Sorry, the service is temporarily unavailable.");
}

mysqli_set_charset($conn, "utf8mb4");
?>
