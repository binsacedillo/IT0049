CREATE DATABASE IF NOT EXISTS tasks_for_today
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE tasks_for_today;

DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS users;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

-- UTC+08:00 has no daylight saving time, so this produces the Manila-local date.
SET @manila_now = DATE_ADD(UTC_TIMESTAMP(), INTERVAL 8 HOUR);
SET @today = DATE(@manila_now);

INSERT INTO tasks (title, status, task_date, created_at) VALUES
    ('Review project requirements', 'completed', DATE_SUB(@today, INTERVAL 1 DAY), @manila_now),
    ('Prepare database schema', 'completed', DATE_SUB(@today, INTERVAL 1 DAY), @manila_now),
    ('Check today''s team priorities', 'completed', @today, @manila_now),
    ('Update the task dashboard', 'in-progress', @today, @manila_now),
    ('Verify database records', 'pending', @today, @manila_now),
    ('Submit the daily progress report', 'pending', @today, @manila_now),
    ('Plan the next development task', 'pending', DATE_ADD(@today, INTERVAL 1 DAY), @manila_now),
    ('Review deployment readiness', 'pending', DATE_ADD(@today, INTERVAL 1 DAY), @manila_now);

INSERT INTO users (username, full_name, email, created_at) VALUES
    ('vinceacedillo', 'Vince Gio Acedillo', 'vince.acedillo@example.com', @manila_now);
