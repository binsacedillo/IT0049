CREATE DATABASE IF NOT EXISTS techfa1_pos
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE techfa1_pos;

DROP TABLE IF EXISTS customers;
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
    ('Ana Reyes', 'ana.reyes@example.com', '0917-123-4501', '2026-09-24 09:00:00'),
    ('Ben Santos', 'ben.santos@example.com', '0917-123-4502', '2026-09-24 09:05:00'),
    ('Carla Mendoza', 'carla.mendoza@example.com', '0917-123-4503', '2026-09-24 09:10:00'),
    ('Diego Cruz', 'diego.cruz@example.com', '0917-123-4504', '2026-09-24 09:15:00'),
    ('Ella Garcia', 'ella.garcia@example.com', '0917-123-4505', '2026-09-24 09:20:00');

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL,
    avatar VARCHAR(255) NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO users (username, full_name, role, created_at) VALUES
    ('admin', 'Alex Dela Cruz', 'Administrator', '2026-09-24 09:00:00'),
    ('manager01', 'Bianca Flores', 'Manager', '2026-09-24 09:05:00'),
    ('cashier01', 'Carlo Ramos', 'Cashier', '2026-09-24 09:10:00'),
    ('cashier02', 'Diana Lim', 'Cashier', '2026-09-24 09:15:00'),
    ('stock01', 'Enzo Navarro', 'Inventory Clerk', '2026-09-24 09:20:00');
