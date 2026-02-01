<?php
include '../backend/Car.php';
$carObj = new Car();
$cars = $carObj->getAllCars();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars | BLITZ Auto Market</title>
    <link rel="stylesheet" href="../css/cars.css">
</head>
<body>

<?php include '../includes/header.php'; ?>

<section class="cars-section">
    <h2>Available Cars</h2>

    <?php if (empty($cars)): ?>
        <p style="text-align:center;">No cars added yet.</p>
    <?php endif; ?>

    <div class="cars-grid">
        <?php foreach ($cars as $car): ?>
            <div class="car-card">
                <?php if ($car['image']): ?>
                    <img src="../uploads/cars/<?= $car['image']; ?>" alt="Car">
                <?php endif; ?>

                <h3><?= htmlspecialchars($car['brand'] . ' ' . $car['model']); ?></h3>
                <p>Year: <?= $car['year']; ?></p>
                <p class="price">$<?= $car['price']; ?></p>
                <p class="seller">Seller: <?= htmlspecialchars($car['full_name']); ?></p>
                <a href="car-details.php?id=<?= $car['id']; ?>" class="btn">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
</body>
</html>
