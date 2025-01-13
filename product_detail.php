<?php
    //Make connection to the database
    require ('include/connect_db.php');

    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'] ;    
        $query = "SELECT * FROM products WHERE item_id = " . $id;
    }
    
    //Retrieve items from items database table

  //  echo $query;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array( $result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - MKTIME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    <?php
         include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/navbar.php';
    ?>

    <!-- Product Details -->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="image/<?php echo $row['item_img']; ?>" class="img-fluid rounded" alt="<?php echo $row['item_name']; ?>">
            </div>
            <div class="col-md-6">
                <h1 class="mb-3"><?php echo $row['item_name']; ?></h1>
                <p class="text-muted">Category: <strong><?php echo $row['category']; ?></strong></p>
                <p class="lead"><?php echo $row['item_desc']; ?></p>
                <h3 class="mb-4">£<?php echo $row['item_price']; ?></h3>
                <a href='added.php?id=<?php echo $row['item_id']; ?>' class="btn btn-dark btn-lg w-100">Add to basket</a>
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
