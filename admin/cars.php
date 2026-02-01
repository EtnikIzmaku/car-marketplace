<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: ../index.php");
    exit;
}

include __DIR__ . '/../backend/Car.php';

$carObj = new Car();
$cars = $carObj->getAllCars();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Cars</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="/car-marketplace/css/style.css">
</head>
<body> 

<?php include 'includes/admin_header.php'; ?>

<div class="dashboard-container">
<?php include 'includes/admin_sidebar.php'; ?>

<main class="dashboard-content">
    <h2>Cars List</h2>

    <table>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Added By</th>
        </tr>

        <?php foreach ($cars as $car): ?>
        <tr>
            <td><?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?></td>
            <td>$<?= number_format($car['price'], 2) ?></td>
            <td><?= htmlspecialchars($car['full_name']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
