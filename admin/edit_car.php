<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: ../login.php");
    exit;
}

include __DIR__ . '/../backend/Car.php';
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

$error = '';

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
        
        <?php if ($error): ?>
            <div class="alert alert-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data" class="edit-form">
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand" value="<?= htmlspecialchars($car['brand']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" value="<?= htmlspecialchars($car['model']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" value="<?= htmlspecialchars($car['year']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price ($):</label>
                <input type="number" id="price" name="price" value="<?= htmlspecialchars($car['price']) ?>" required step="0.01">
            </div>
            
            <div class="form-group">
                <label for="mileage">Mileage (km):</label>
                <input type="number" id="mileage" name="mileage" value="<?= htmlspecialchars($car['mileage'] ?? '') ?>">
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description"><?= htmlspecialchars($car['description'] ?? '') ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Image:</label>
                <?php if ($car['image']): ?>
                    <div class="current-image">
                        <img src="../uploads/cars/<?= htmlspecialchars($car['image']) ?>" alt="Current image">
                        <small>Current image. Upload a new one to replace it.</small>
                    </div>
                <?php endif; ?>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            
            <div class="form-actions">
                <button type="submit" name="save_car" class="btn btn-primary">Ruaj Ndryshimet</button>
                <a href="cars.php" class="btn btn-secondary">Anulo</a>
            </div>
        </form>
    </main>
</div>

</body>
</html>

