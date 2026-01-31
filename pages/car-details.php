<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details | BLITZ Auto Market</title>

    <link rel="stylesheet" href="../css/cars.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <section class="car-details-container">

        <div class="car-image">
            <img src="../img/vetura/m5f90.webp" alt="BMW M5 F90">
        </div>

        <div class="car-info">
            <h1>BMW M5 F90</h1>
            <p class="price">$32,000</p>

            <ul class="car-specs">
                <li><strong>Brand:</strong> BMW</li>
                <li><strong>Model:</strong> M5 F90</li>
                <li><strong>Year:</strong> 2019</li>
                <li><strong>Mileage:</strong> 45,000 km</li>
            </ul>

            <button class="contact-btn">Contact Seller</button>
        </div>

    </section>

    <section class="car-description">
        <h2>Description</h2>
        <p>
            This BMW M5 F90 is in excellent condition with full service history.
            Powerful V8 engine, luxury interior, and top performance.
            The car has been well maintained and driven carefully.
        </p>
    </section>

    <?php include '../includes/footer.php'; ?>
    <script src="../js/cars.js"></script>
</body>
</html>