<nav class="admin-navbar">
    <div class="admin-logo">
        <span>BLITZ Admin Panel</span>
    </div>

    <ul class="admin-nav-links">
        <li><span class="admin-name"><?= htmlspecialchars($_SESSION['full_name']); ?></span></li>
        <li><a href="/car-marketplace/index.php">Back to Website</a></li>
        <li><a href="/car-marketplace/logout.php">Logout</a></li>
    </ul>
</nav>
