<?php
function getDatabaseConnection() {
    $host = '127.0.0.1'; // MySQL host
    $dbname = 'portfolioCMS'; // Database name
    $username = 'root'; // MySQL username
    $password = ''; // MySQL password (leave blank if no password)

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

function initializeAdminUser($db) {
    $db->users->insertOne([
        'username' => 'admin',
        'password' => '$2y$10$e0NRz1J3Q9jFJ8Z8v9F1Uu5z8z3J8F9J8F9J8F9J8F9J8F9J8F9J8', // Replace with hashed password
        'role' => 'admin'
    ]);
}

echo password_hash('your_password', PASSWORD_DEFAULT);
?>