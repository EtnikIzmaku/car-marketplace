<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: ../login.php");
    exit;
}

include '../backend/Car.php';
$carObj = new Car();

$car_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($car_id <= 0) {
    header("Location: cars.php?error=" . urlencode("ID e makinës jo valid"));
    exit;
}

$car = $carObj->getCarById($car_id);

if (!$car) {
    header("Location: cars.php?error=" . urlencode("Makina nuk u gjet"));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageName = $car['image'];
    
    if (!empty($_FILES['image']['name'])) {
        if (!empty($car['image'])) {
            $oldImagePath = __DIR__ . '/../uploads/cars/' . $car['image'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
        $imageName = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            __DIR__ . "/../uploads/cars/" . $imageName
        );
    }

    $updateData = [
        ':brand' => $_POST['brand'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':price' => $_POST['price'],
        ':mileage' => $_POST['mileage'] ?? null,
        ':description' => $_POST['description'] ?? null
    ];
    
    if (!empty($_FILES['image']['name'])) {
        $updateData[':image'] = $imageName;
    }

    if ($carObj->updateCar($car_id, $updateData)) {
        header("Location: cars.php?updated=1");
        exit;
    } else {
        $error = "Gabim gjatë përditësimit të makinës";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car | Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="/car-marketplace/css/style.css">
</head>
<body>

<?php include 'includes/admin_header.php'; ?>

<div class="dashboard-container">
    <?php include 'includes/admin_sidebar.php'; ?>

    <main class="dashboard-content">
        <h2>Edit Car</h2>
        
        <?php if (isset($error)): ?>
            <p style="color:red; padding: 10px; background: #f8d7da; border-radius: 6px; margin-bottom: 15px;">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data" style="max-width: 600px;">
            <div style="margin-bottom: 15px;">
                <label>Brand:</label>
                <input type="text" name="brand" value="<?= htmlspecialchars($car['brand']) ?>" required style="width: 100%; padding: 8px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label>Model:</label>
                <input type="text" name="model" value="<?= htmlspecialchars($car['model']) ?>" required style="width: 100%; padding: 8px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label>Year:</label>
                <input type="number" name="year" value="<?= htmlspecialchars($car['year']) ?>" required style="width: 100%; padding: 8px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label>Price ($):</label>
                <input type="number" name="price" value="<?= htmlspecialchars($car['price']) ?>" required style="width: 100%; padding: 8px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label>Mileage (km):</label>
                <input type="number" name="mileage" value="<?= htmlspecialchars($car['mileage'] ?? '') ?>" style="width: 100%; padding: 8px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label>Description:</label>
                <textarea name="description" style="width: 100%; padding: 8px; min-height: 100px;"><?= htmlspecialchars($car['description'] ?? '') ?></textarea>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label>Image:</label>
                <?php if ($car['image']): ?>
                    <div style="margin-bottom: 10px;">
                        <img src="../uploads/cars/<?= htmlspecialchars($car['image']) ?>" alt="Current image" style="max-width: 200px; height: auto; display: block; margin-bottom: 10px;">
                        <small>Current image. Upload a new one to replace it.</small>
                    </div>
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" style="width: 100%; padding: 8px;">
            </div>
            
            <div style="margin-top: 20px;">
                <button type="submit" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px;">
                    Update Car
                </button>
                <a href="cars.php" style="padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; display: inline-block;">
                    Cancel
                </a>
            </div>
        </form>
    </main>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>

