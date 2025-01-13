<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/navbar.php'; ?>

    <?php
       // include ('session.php');
     //  session_start();
        require ( 'include/connect_db.php' );

        if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
        {
            $query = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
            $result = mysqli_query ($link, $query);
            $order_id = mysqli_insert_id($link) ;
            $query = "SELECT * FROM products WHERE item_id IN (";
            foreach ($_SESSION['cart'] as $id => $value) { $query .= $id . ','; }
            $query = substr( $query, 0, -1 ) . ') ORDER BY item_id ASC';
            
            $result = mysqli_query ($link, $query);
            
            

            while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
            {
                $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
                          VALUES ( $order_id, ".$row['item_id'].",
                          ".$_SESSION['cart'][$row['item_id']]['quantity'].",
                          ".$_SESSION['cart'][$row['item_id']]['price'].")" ;
                
                $insert_result = mysqli_query($link,$query);
            }
            
            mysqli_close($link);

            echo '<div class="container mt-5">
    <div class="alert alert-success text-center" role="alert">
        <h4 class="alert-heading">Thank You for Your Order!</h4>
        <hr>
        <p>Your Order Number is <strong>#' . htmlspecialchars($order_id) . '</strong>.</p>
        
        
    </div>
</div>';

            $_SESSION['cart'] = NULL ;
        }
        else 
        { 
            echo '
            <div class="container mt-5">
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">Your Cart is Empty</h4>
                    <p>It looks like you haven’t added anything to your cart yet.</p>
                    <hr>
                    <a href="products.php" class="btn btn-dark">Start Shopping</a>
                </div>
            </div>'; 
        }


?>

    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>