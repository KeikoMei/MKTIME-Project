<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MKTIME - Luxury Watches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <!-- Navbar -->
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/navbar.php';
    ?>

    <!-- Image -->
    <div class="row">
            <img src="./image/landing.jpg" class="img-fluid" alt="watch">
          </div>

    <!-- Hero Section -->
    <div class="bg-dark text-white text-center py-5">
        <h1>Welcome to MKTIME</h1>
        <p>Discover timeless elegance with our luxury Swiss watches.</p>
    </div>

    <!-- Marketing Section -->
    <div class="container text-center py-4">
        <h2>Why Choose MKTIME?</h2>
        <p>Craftsmanship, precision, and elegance. Elevate your style with our exclusive collection of Swiss watches.</p>
    </div>

    <!-- Explore Products -->
    <div class="container py-4">
        <h2 class="text-center">Explore Our Products</h2>
        <div class="row mt-4">
            
            <div class="col-md-6">
                <div class="card">
                    <img src="./image/products_women.jpg" class="card-img-top img-fluid" alt="Women's Collection">
                    <div class="card-body">
                        <h5 class="card-title">Women's Collection</h5>
                        <p class="card-text">Elegant timepieces for every occasion.</p>
                        <a href="products.php?category=women" class="btn btn-dark">Explore</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <img src="./image/products_men.jpg" class="card-img-top img-fluid" alt="Men's Collection">
                    <div class="card-body">
                        <h5 class="card-title">Men's Collection</h5>
                        <p class="card-text">Timeless designs for the modern gentleman.</p>
                        <a href="products.php?category=men" class="btn btn-dark">Explore</a>
                    </div>
                </div>
            </div>

            
    
    
        


            
        </div>
    </div>

    <!-- Footer -->
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
