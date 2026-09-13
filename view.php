<?php
require_once "config.php";

$search = trim($_GET["search"] ?? "");

if ($search !== "") {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, name, email, topic, preferred_slot, registered_at
         FROM quiz_registrations
         WHERE name LIKE ? OR email LIKE ? OR topic LIKE ?
         ORDER BY id DESC"
    );
    $like = "%" . $search . "%";
    mysqli_stmt_bind_param($stmt, "sss", $like, $like, $like);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $result = mysqli_query(
        $conn,
        "SELECT id, name, email, topic, preferred_slot, registered_at
         FROM quiz_registrations
         ORDER BY id DESC"
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Registrations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="container nav">
        <h1>QuizPortal</h1>
        <nav>
            <a href="index.php">Register</a>
            <a href="view.php">View Registrations</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="card">
        <h2>Registered Learners</h2>

        <form class="search-form" method="GET" action="view.php">
            <input type="search" name="search" value="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>"
                   placeholder="Search by name, email or topic">
            <button type="submit">Search</button>
            <a class="clear-link" href="view.php">Clear</a>
        </form>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Topic</th>
                        <th>Preferred Slot</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo (int)$row["id"]; ?></td>
                        <td><?php echo htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["topic"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["preferred_slot"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["registered_at"], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6">No registrations found.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<footer>
    <p>Online Quiz Registration Portal &copy; 2026</p>
</footer>
</body>
</html>
<?php
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
