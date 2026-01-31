<?php
include 'Database.php';

class User {
    private $conn;
    private $table = 'users';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($full_name, $email, $password, $role = 'user') {
        $query = "INSERT INTO {$this->table} 
                  (full_name, email, password, role) 
                  VALUES (:full_name, :email, :password, :role)";

        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $stmt->execute([
            ':full_name' => $full_name,
            ':email'     => $email,
            ':password'  => $hashedPassword,
            ':role'      => $role
        ]);
    }

    public function login($email, $password) {
        $query = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function emailExists($email) {
        $query = "SELECT id FROM {$this->table} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->rowCount() > 0;
    }
}
