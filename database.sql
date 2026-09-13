CREATE DATABASE IF NOT EXISTS quiz_portal;
USE quiz_portal;

CREATE TABLE IF NOT EXISTS quiz_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    topic VARCHAR(100) NOT NULL,
    preferred_slot VARCHAR(50) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO quiz_registrations (name, email, topic, preferred_slot) VALUES
('Aarav Sharma', 'aarav@example.com', 'Python', '10:00 AM - 11:00 AM'),
('Neha Patil', 'neha@example.com', 'Artificial Intelligence', '12:00 PM - 01:00 PM'),
('Rahul Verma', 'rahul@example.com', 'SQL & DBMS', '02:00 PM - 03:00 PM'),
('Sneha Joshi', 'sneha@example.com', 'Data Science', '04:00 PM - 05:00 PM'),
('Vikas More', 'vikas@example.com', 'Machine Learning', '10:00 AM - 11:00 AM');
