# Online Quiz Registration Portal

## Project Statement
**No. 36 — Online Quiz Registration Portal:** Register learners for a quiz with name, email, topic, and preferred slot; view/filter entries.

## Objective
To develop a small database-driven web application using HTML/CSS, PHP and MySQL that stores quiz registrations securely and displays them in a browser.

## Main Features
1. Learner registration form.
2. HTML client-side validation.
3. Secure PHP server-side validation.
4. MySQL INSERT operation.
5. MySQL SELECT operation.
6. Search/filter by name, email or topic.
7. Safe HTML output using htmlspecialchars().
8. Prepared statements for user-input SQL.
9. Responsive CSS interface.

## Technology Stack
- HTML5
- CSS3
- PHP
- MySQL
- InfinityFree hosting

## Database
Table: `quiz_registrations`

| Column | Type | Constraint |
|---|---|---|
| id | INT | Primary Key, Auto Increment |
| name | VARCHAR(100) | NOT NULL |
| email | VARCHAR(150) | NOT NULL |
| topic | VARCHAR(100) | NOT NULL |
| preferred_slot | VARCHAR(50) | NOT NULL |
| registered_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |

## Application Flow
HTML Form → PHP Server-side Validation → Prepared INSERT → MySQL Database → SELECT/Search → Browser Output

## Security
All SQL statements containing user input use prepared statements with `?` placeholders and parameter binding. Database values are escaped with `htmlspecialchars()` before display. Database credentials are kept in `config.php` and should never be placed in screenshots or public GitHub repositories.

## InfinityFree Deployment
1. Create an InfinityFree hosting account.
2. Create a MySQL database.
3. Import `database.sql` into the hosting database (adjust database creation syntax if the host does not allow CREATE DATABASE).
4. Put the project PHP/CSS files into the hosting `htdocs` directory.
5. Update `config.php` with the hosting MySQL host, username, password and database name.
6. Open the hosted URL in an incognito/private browser.
7. Test registration and search.

## Required Screenshots
Take screenshots of:
1. Home/data-entry form.
2. Completed form.
3. Successful insert confirmation.
4. Record-list page.
5. Search feature.
6. Harmless quote input such as `O'Reilly` stored/displayed safely.
7. Hosted InfinityFree URL.

## Student Details
Name: ______________________
Roll No.: __________________
Division: ___________________
Hosted URL: _________________
