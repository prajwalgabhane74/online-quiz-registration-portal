<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$topic = trim($_POST["topic"] ?? "");
$slot = trim($_POST["slot"] ?? "");

$allowed_topics = [
    "Artificial Intelligence", "Machine Learning", "Python",
    "SQL & DBMS", "Data Science", "Computer Networks"
];
$allowed_slots = [
    "10:00 AM - 11:00 AM", "12:00 PM - 01:00 PM",
    "02:00 PM - 03:00 PM", "04:00 PM - 05:00 PM"
];

if ($name === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    !in_array($topic, $allowed_topics, true) ||
    !in_array($slot, $allowed_slots, true)) {
    die("Invalid input. Please go back and enter valid details.");
}

/* Prepared statement prevents SQL injection. */
$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO quiz_registrations (name, email, topic, preferred_slot)
     VALUES (?, ?, ?, ?)"
);

mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $topic, $slot);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Successful</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <main class="container">
        <section class="card success">
            <h2>Registration Successful!</h2>
            <p>Your quiz registration has been saved successfully.</p>
            <a class="button-link" href="view.php">View Registrations</a>
            <a class="button-link secondary" href="index.php">Register Another Learner</a>
        </section>
    </main>
    </body>
    </html>
    <?php
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    die("Unable to save the registration. Please try again.");
}
?>
