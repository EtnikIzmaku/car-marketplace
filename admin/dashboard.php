<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 1) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="/car-marketplace/css/style.css">
</head>
<body>

<?php include 'includes/admin_header.php'; ?>

<div class="dashboard-container">
    <?php include 'includes/admin_sidebar.php'; ?>

    <main class="dashboard-content">
        <h1>Welcome Admin</h1>
        <p>Use the menu to manage cars and messages.</p>
    </main>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
