<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['user']);
$isAdmin = $isLoggedIn && $_SESSION['user']['role'] === 'admin';
?>

<nav class="navbar">
    <div class="logo">
        <img src="/car-marketplace/img/logo-white.png" alt="BLITZ Auto Market">
        <span>BLITZ Auto Market</span>
    </div>

    <ul class="nav-links">
        <li><a href="/car-marketplace/index.php">Home</a></li>
        <li><a href="/car-marketplace/pages/cars.php">Cars</a></li>
        <li><a href="/car-marketplace/contact.php">Contact</a></li>
        <li><a href="/car-marketplace/about.php">About</a></li>

        <?php if ($isLoggedIn): ?>
            <li><a href="/car-marketplace/pages/add-car.php">Add Car</a></li>

            <?php if ($isAdmin): ?>
                <li><a href="/car-marketplace/admin/dashboard.php">Dashboard</a></li>
            <?php endif; ?>

            <li><a href="/car-marketplace/backend/logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="/car-marketplace/login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>