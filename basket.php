<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Basket - MKTIME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
    <!-- Navbar -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/navbar.php'; ?>

    <?php

//session_start();


    # Check if form has been submitted for update.
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        # Update changed quantity field values.
        foreach ( $_POST['qty'] as $item_id => $item_qty )
        {
            # Ensure values are integers.
            $id = (int) $item_id;
            $qty = (int) $item_qty;

            # Change quantity or delete if zero.
            if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
            elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
        }
    }

    # Initialise grand total variable.
    $total = 0; 

    if (!empty($_SESSION['cart']))
    {
        require ('include/connect_db.php');

        $query = "SELECT * FROM products WHERE item_id IN (";
        foreach ($_SESSION['cart'] as $id => $value) { $query .= $id . ','; }
        $query = substr( $query, 0, -1 ) . ') ORDER BY item_id ASC';
        $result = mysqli_query($link, $query);

        # Display body section with a form and a table.
        echo '<form action="basket.php" method="post">';

        //display table header
        echo '<!-- Basket Section -->
    <div class="container py-5">
        <h1 class="text-center mb-4">Your Shopping Basket</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                    
                    <th scope="col">Product</th>
                        
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Subtotal</th>
                       
                    </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
        {
            # Calculate sub-totals and grand total.
            $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
            $total += $subtotal;


            echo "<tr>
                    
                    <td><img src='image/{$row['item_img']}' alt='{$row['item_name']}' class='img-thumbnail' style='width: 60px; height: auto;'>
                    {$row['item_name']}</td>
                        <td><input name='qty[{$row['item_id']}]' type='number' class='form-control w-50' value='{$_SESSION['cart'][$row['item_id']]['quantity']}' min='0'></td>
                        <td>&pound{$row['item_price']}</td>
                        <td>&pound".number_format ($subtotal, 2)."</td>
                        
                    </tr>";
        }

        //Display the total.
      

        echo "</tbody>
                <tfoot>
                    <tr>
                        <td colspan='3' class='text-end'><strong>Total:</strong></td>
                        <td><strong>&pound".number_format($total,2)."</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class='text-center mt-4'>
        <input type='submit' name='submit' class='btn btn-dark' value='Update My Basket'>
        <a href='checkout.php?total=".$total."' class='btn btn-dark'>Checkout Now</a>
              

        </div>
    </div>
     </form>";
    }
    else
        # Or display a message.
    { 
        echo ' 
        <div class="container mt-5">
    <div class="alert alert-warning text-center" role="alert">
        <h4 class="alert-heading">Your basket is currently empty.</p></h4>
        <p>Looks like you haven’t added anything to your cart yet.</p>
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
