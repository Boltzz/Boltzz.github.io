CREATE DATABASE portfolioCMS;

USE portfolioCMS;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    tags TEXT NOT NULL
);

-- Insert an admin user
INSERT INTO users (username, password, role) VALUES (
    'admin',
    '<?php echo password_hash('admin123', PASSWORD_DEFAULT); ?>',
    'admin'
);