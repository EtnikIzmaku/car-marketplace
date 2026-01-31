<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLITZ Auto Market</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <section class="hero">
        <h1>BLITZ Auto Market</h1>
        <p>Buy & Sell Cars with Confidence</p>
    </section>

    <!-- search -->
    <section class="search-section">
        <input type="text" id="brand" placeholder="Brand">
        <input type="text" id="model" placeholder="Model">
        <input type="number" id="price" placeholder="Max Price">
        <button onclick="searchCars()">Search</button>
    </section>

    <!-- slideri per vetura-->
    <section class="slider-section">
        <h2 class="slider-title">Hot Deals & Low Prices</h2>
        <div class="slider" id="carSlider">
            <img src="img/vetura/rs7.png" class="active">
            <img src="img/vetura/MercC.png">
            <img src="img/vetura/cls.webp">
            <img src="img/vetura/m5f90.webp">
        </div>
    </section>
    <!-- veturat ne shitje -->
    <section class="cars-section">
        <h2>Available Cars</h2>

        <div class="cars-grid" id="carsGrid">

            <div class="car-card">
                <img src="img/vetura/passatB6.png" alt="Car">
                <h3>PASSAT B6</h3>
                <p>Year: 2008</p>
                <p class="price">$5,800</p>
                <a href="#" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/CLS.png" alt="Car">
                <h3>Mercedes CLS</h3>
                <p>Year: 2017</p>
                <p class="price">$25,000</p>
                <a href="#" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/m5f90.webp" alt="Car">
                <h3>BMW M5 F90</h3>
                <p>Year: 2019</p>
                <p class="price">$32,000</p>
                <a href="pages/car-details.php" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/golf6.png" alt="Car">
                <h3>Golf 6</h3>
                <p>Year: 2011</p>
                <p class="price">$9,200</p>
                <a href="#" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/MercC.png" alt="Car">
                <h3>Mercedes C-Class</h3>
                <p>Year: 2021</p>
                <p class="price">$28,000</p>
                <a href="#" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/rs7.png" alt="Car">
                <h3>AUDI RS7</h3>
                <p>Year: 2018</p>
                <p class="price">$46,000</p>
                <a href="#" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/mercedesE.png" alt="Car">
                <h3>Mercedes E-Class</h3>
                <p>Year: 2008</p>
                <p class="price">$6,000</p>
                <a href="pages/car-details.html" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="./img/vetura/a3.png" alt="Car">
                <h3>AUDI A3</h3>
                <p>Year: 2014</p>
                <p class="price">$13,000</p>
                <a href="#" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/golf4.png" alt="Car">
                <h3>Golf 4</h3>
                <p>Year: 2002</p>
                <p class="price">$4,200</p>
                <a href="#" class="btn">View Details</a>
            </div>

            <div class="car-card">
                <img src="img/vetura/mercerdesE2019.png" alt="Car">
                <h3>Mercedes E-Class</h3>
                <p>Year: 2019</p>
                <p class="price">$27,000</p>
                <a href="#" class="btn">View Details</a>
            </div>
        </div>
    </section>



     <?php include 'includes/footer.php'; ?>


    <script src="js/home.js"></script>

</body>
</html>