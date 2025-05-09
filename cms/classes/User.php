<?php
require_once 'config.php';

class User {
    protected $db;

    public function __construct() {
        $this->db = getDatabaseConnection();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getDB() {
        return $this->db;
    }
}
?>