<?php
include 'Database.php';

class Car {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function addCar($data) {
        $sql = "INSERT INTO cars 
        (brand, model, year, price, mileage, description, image, created_by)
        VALUES 
        (:brand, :model, :year, :price, :mileage, :description, :image, :created_by)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function getAllCars() {
        $sql = "SELECT cars.*, users.full_name
                FROM cars
                JOIN users ON cars.created_by = users.id
                ORDER BY cars.id DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCarsByUser($userId) {
        $stmt = $this->db->prepare("SELECT * FROM cars WHERE created_by = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCarById($id) {
        $stmt = $this->db->prepare("SELECT * FROM cars WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteCar($id) {
        $stmt = $this->db->prepare("DELETE FROM cars WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateCar($id, $data) {
        $sql = "UPDATE cars SET 
                brand = :brand, 
                model = :model, 
                year = :year, 
                price = :price, 
                mileage = :mileage, 
                description = :description";
        
        $params = [
            ':brand' => $data[':brand'],
            ':model' => $data[':model'],
            ':year' => $data[':year'],
            ':price' => $data[':price'],
            ':mileage' => $data[':mileage'] ?? null,
            ':description' => $data[':description'] ?? null,
            ':id' => $id
        ];
        
        if (isset($data[':image']) && $data[':image'] !== null) {
            $sql .= ", image = :image";
            $params[':image'] = $data[':image'];
        }
        
        $sql .= " WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
}
