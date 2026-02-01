<header class="admin-header">
    <div class="admin-left">
        <h2>BLITZ Admin Panel</h2>
    </div>

    <div class="admin-user">
        <span class="admin-name"><?= htmlspecialchars($_SESSION['full_name']); ?></span>
        <a href="/car-marketplace/index.php" class="back-home">Back to Website</a>
        <a href="/car-marketplace/logout.php" class="logout-link">Logout</a>
    </div>
</header>
