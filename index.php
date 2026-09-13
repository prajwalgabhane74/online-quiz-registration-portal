<?php
// Online Quiz Registration Portal - Home / Registration Form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz Registration Portal</title>
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
    <section class="hero">
        <h2>Online Quiz Registration Portal</h2>
        <p>Register for an upcoming quiz by entering your details, topic and preferred slot.</p>
    </section>

    <section class="card">
        <h3>Quiz Registration Form</h3>
        <form action="save.php" method="POST">
            <label for="name">Learner Name</label>
            <input type="text" id="name" name="name" required maxlength="100"
                   pattern="[A-Za-z .'-]{2,100}" placeholder="Enter your name">

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required maxlength="150"
                   placeholder="example@email.com">

            <label for="topic">Quiz Topic</label>
            <select id="topic" name="topic" required>
                <option value="">-- Select Topic --</option>
                <option value="Artificial Intelligence">Artificial Intelligence</option>
                <option value="Machine Learning">Machine Learning</option>
                <option value="Python">Python</option>
                <option value="SQL & DBMS">SQL & DBMS</option>
                <option value="Data Science">Data Science</option>
                <option value="Computer Networks">Computer Networks</option>
            </select>

            <label for="slot">Preferred Slot</label>
            <select id="slot" name="slot" required>
                <option value="">-- Select Slot --</option>
                <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
            </select>

            <button type="submit">Register for Quiz</button>
        </form>
    </section>
</main>

<footer>
    <p>Online Quiz Registration Portal &copy; 2026</p>
</footer>
</body>
</html>
