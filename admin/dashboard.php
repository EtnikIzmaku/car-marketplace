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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
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

</body>
</html>
