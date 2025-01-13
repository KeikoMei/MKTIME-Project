<?php

    # Access session.
    session_start() ;
    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) 
    { 
       require ( 'login_tools.php' ) ; 
       load() ; 
      
    }


    //Make connection to the database
    require ('include/connect_db.php');

    if (isset($_GET['category'])) 
    {
        $category = $_GET['category'] ;    
        $query = "SELECT * FROM products WHERE category = '" . $category . "'";
    }
    else 
    {
        $query = "SELECT * FROM products";
    }
    //Retrieve items from items database table

    //echo $query;
    $result = mysqli_query($link, $query);
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


    <!-- Products Section -->
    <div class="container py-5">
        <h2 class="text-center mb-4">Our Products</h2>
        <div class="row g-4">

            <?php
                if ( mysqli_num_rows( $result ) > 0 )
                {
	                while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ))
	                {
                        echo "
                        <div class='col-md-4'>
                            <a href='product_detail.php?id=" . $row['item_id'] . "' class='text-decoration-none'>
                            <div class='card'>
                            <img src='image/" . $row['item_img'] . "' class='card-img-top' alt='" . $row['item_name'] . "'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row['item_name'] . "</h5>
                            <p class='card-text'>" . $row['item_desc'] . "</p>
                            <p class='card-text'>£" . $row['item_price'] . "</p>
                            <a href='product_detail.php?id=" . $row['item_id'] . "' class='btn btn-dark'>See Details</a>
                            <a href='added.php?id=" . $row['item_id'] . "' class='btn btn-dark'>Add to basket</a>
                        </div>
                    </div>
                </a>
            </div>";
                   

           

              }
                }
	

              ?>

            

          

        </div>
    </div>

    <!-- Footer -->
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
