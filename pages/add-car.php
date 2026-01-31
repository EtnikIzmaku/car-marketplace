<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car | BLITZ Auto Market</title>
    <link rel="stylesheet" href="../css/cars.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <section class="add-car-section">
        <h2>Add Your Car</h2>

        <form id="addCarForm" class="add-car-form">
            <input type="text" id="brand" placeholder="Car Brand" required>
            <input type="text" id="model" placeholder="Model" required>
            <input type="number" id="year" placeholder="Year" required>
            <input type="number" id="price" placeholder="Price ($)" required>
            <input type="number" id="mileage" placeholder="Mileage (km)" required>
            <input type="file" id="image" accept="image/*" required>
            <button type="submit">Submit Car</button>
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
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="cars.html">Cars</a></li>
                    <li><a href="../contact.html">Contact</a></li>
                    <li><a href="../about.html">About</a></li>

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
    <script src="../js/cars.js"></script>
</body>
</html>