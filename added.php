<?php
   //session_start() ;
   
    require ('include/connect_db.php');

    if (isset($_GET['id'])) $id = $_GET['id'];

    $query = "SELECT * FROM products WHERE item_id = $id";
    $result = mysqli_query($link, $query);

    if ( mysqli_num_rows( $result ) == 1 ) 
    {
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        // Product details are fetched and stored in $row
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - MKTIME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    <?php
         include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/navbar.php';
    ?>
    
<?php

    # Check if cart already contains one of this product id.
    if (isset($_SESSION['cart'][$id])) {
        # Add one more of this product.
        $_SESSION['cart'][$id]['quantity']++;
        echo '
        <div class="container mt-4">
            <div class="card border-secondary">
                <div class="card-body">
                    <h5 class="card-title text-success">Item Updated</h5>
                    <p class="card-text">Another <strong>' . $row["item_name"] . '</strong> has been added to your cart.</p>
                    <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
                    <a href="basket.php" class="btn btn-dark">View Your Basket</a>
                </div>
            </div>
        </div>';
    } else {
        # Add one of this product to the cart.
        $_SESSION['cart'][$id] = array('quantity' => 1, 'price' => $row['item_price']);
        echo '
        <div class="container mt-4">
            <div class="card border-secondary">
                <div class="card-body">
                    <h5 class="card-title text-success">Item Added</h5>
                    <p class="card-text">A <strong>' . $row["item_name"] . '</strong> has been added to your basket.</p>
                    <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
                    <a href="basket.php" class="btn btn-dark">View Your Basket</a>
                </div>
            </div>
        </div>';
    }



?>

  <!-- Footer -->
  <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>