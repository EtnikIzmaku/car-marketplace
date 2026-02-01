<?php
include 'Database.php';

class Message {
    private $conn;
    private $table = 'messages';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addMessage($name, $email, $message) {
        $query = "INSERT INTO {$this->table} 
                  (name, email, message, created_at) 
                  VALUES (:name, :email, :message, NOW())";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message
        ]);
    }
}

