<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: ../login.php");
    exit;
}

include '../backend/Car.php';
$carObj = new Car();

$car_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($car_id > 0) {
    try {
        $car = $carObj->getCarById($car_id);
        
        $carObj->deleteCar($car_id);
        
        if ($car && !empty($car['image'])) {
            $imagePath = __DIR__ . '/../uploads/cars/' . $car['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        header("Location: cars.php?deleted=1");
        exit;
    } catch (PDOException $e) {
        header("Location: cars.php?error=" . urlencode("Gabim gjatë fshirjes së makinës: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: cars.php?error=" . urlencode("ID e makinës jo valid"));
    exit;
}
?>

