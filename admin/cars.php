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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
    <?php
    if (isset($_GET['deleted']) && $_GET['deleted'] == 1) {
        echo '<p style="color:green; padding: 10px; background: #d4edda; border-radius: 6px; margin-bottom: 15px;">Makina u fshi me sukses!</p>';
    }
    
    if (isset($_GET['updated']) && $_GET['updated'] == 1) {
        echo '<p style="color:green; padding: 10px; background: #d4edda; border-radius: 6px; margin-bottom: 15px;">Makina u përditësua me sukses!</p>';
    }
    
    if (isset($_GET['error'])) {
        echo '<p style="color:red; padding: 10px; background: #f8d7da; border-radius: 6px; margin-bottom: 15px;">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>

    <?php if (count($cars) > 0): ?>
        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Mileage</th>
                <th>Added By</th>
                <th>Veprime</th>
            </tr>

            <?php foreach ($cars as $car): ?>
            <tr>
                <td><?= htmlspecialchars($car['id']) ?></td>
                <td><?= htmlspecialchars($car['brand']) ?></td>
                <td><?= htmlspecialchars($car['model']) ?></td>
                <td><?= htmlspecialchars($car['year']) ?></td>
                <td>$<?= number_format($car['price'], 2) ?></td>
                <td><?= htmlspecialchars($car['mileage'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($car['full_name']) ?></td>
                <td>
                    <a href="edit_car.php?id=<?= urlencode($car['id']) ?>" style="margin-right: 10px; color: #007bff;">Edit</a>
                    <a href="delete_car.php?id=<?= urlencode($car['id']) ?>" onclick="return confirm('A jeni të sigurt që doni ta fshini?')" style="color: #dc3545;">Fshi</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Nuk ka makina të regjistruara.</p>
    <?php endif; ?>
</main>
</div>


</body>
</html>
