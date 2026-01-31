<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | BLITZ Auto Market</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

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

    <?php include 'includes/footer.php'; ?>

    <script src="js/contact.js"></script>
    <script src="js/cars.js"></script>

</body>
</html>