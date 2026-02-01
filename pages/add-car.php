<?php
session_start();
include '../backend/Car.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$carObj = new Car();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $imageName = null;

    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/cars/" . $imageName
        );
    }

    $carObj->addCar([
        ':brand' => $_POST['brand'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':price' => $_POST['price'],
        ':mileage' => $_POST['mileage'],
        ':description' => null,
        ':image' => $imageName,
        ':created_by' => $_SESSION['user_id']
    ]);

    header("Location: cars.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Car | BLITZ Auto Market</title>
    <link rel="stylesheet" href="../css/cars.css">
</head>
<body>

<?php include '../includes/header.php'; ?>

<section class="add-car-section">
    <h2>Add Your Car</h2>

    <form class="add-car-form" method="POST" enctype="multipart/form-data">
        <input type="text" name="brand" placeholder="Car Brand" required>
        <input type="text" name="model" placeholder="Model" required>
        <input type="number" name="year" placeholder="Year" required>
        <input type="number" name="price" placeholder="Price ($)" required>
        <input type="number" name="mileage" placeholder="Mileage (km)">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Submit Car</button>
    </form>
</section>

<?php include '../includes/footer.php'; ?>
</body>
</html>