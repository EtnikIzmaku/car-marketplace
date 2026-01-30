<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | BLITZ Auto Market</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <img src="img/logo-white.png" alt="BLITZ Auto Market">
            <span>BLITZ Auto Market</span>
        </div>

        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="pages/cars.html">Cars</a></li>
            <li><a href="contact.html" class="active">Contact</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="pages/add-car.html" id="addCarLink">Add Car</a></li>
            <li><a href="#" id="profileLink">Profile</a></li>
            <li><a href="#" id="logoutBtn" style="display:none;">Logout</a></li>
            <li><a href="login.html" id="loginBtn">Login</a></li>
        </ul>
    </nav>

    <section class="contact-section">
        <h1>Contact Us</h1>
        <p>Have questions? Get in touch with us.</p>

        <form id="contactForm" class="contact-form">
            <input type="text" id="name" placeholder="Your Name">
            <input type="email" id="email" placeholder="Your Email">
            <textarea id="message" placeholder="Your Message"></textarea>

            <button type="submit">Send Message</button>
        </form>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>BLITZ Auto Market</h3>
                <p>Your trusted marketplace to buy and sell cars easily.</p>
            </div>

            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="pages/cars.html">Cars</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="about.html">About</a></li>
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
            <p>© 2025 BLITZ Auto Market. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/contact.js"></script>
    <script src="js/cars.js"></script>
</body>
</html>