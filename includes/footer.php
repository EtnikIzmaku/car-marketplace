<?php
// nese ka nevoj per session 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3>BLITZ Auto Market</h3>
            <p>Your trusted marketplace to buy and sell cars easily.</p>
        </div>

        <div class="footer-column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/car-marketplace/index.php">Home</a></li>
                <li><a href="/car-marketplace/pages/cars.php">Cars</a></li>
                <li><a href="/car-marketplace/contact.php">Contact</a></li>
                <li><a href="/car-marketplace/about.php">About Us</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Support</h4>
            <ul>
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Contact</h4>
            <p>Email: support@blitzautomarket.com</p>
            <p>Phone: +383 44 920 747</p>
            <p>Phone: +383 49 432 007</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© <?php echo date("Y"); ?> BLITZ Auto Market. All rights reserved.</p>
    </div>
</footer>
