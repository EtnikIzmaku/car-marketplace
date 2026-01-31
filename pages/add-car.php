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

    <?php include '../includes/footer.php'; ?>
    <script src="../js/cars.js"></script>
</body>
</html>