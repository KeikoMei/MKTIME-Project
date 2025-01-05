<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MKTIME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <?php
         include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/navbar.php';
    ?>

    <?php 

    # Display any error messages if present.
    if ( isset( $errors ) && !empty( $errors ) )
    {
        echo '<div class="alert alert-danger text-center" role="alert">';
        echo '<h4 class="alert-heading">There was a problem:</h4>';
        echo '<ul class="list-unstyled">'; // Removes default bullet styling
        foreach ($errors as $msg) 
        { 
            echo "<li>$msg</li>"; 
        }
        echo '</ul>';
        echo '<p>Please try again or <a href="register.php" class="alert-link">Register</a>.</p>';
        echo '</div>';
    }




    ?>

    <!-- Login Form -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100 justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Log In</h1>
                        <form action="login_action.php" method="post">
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Your password">
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Log In</button>
                            <p class="mt-3 text-center">Don't have an account? <a href="register.php" class="alert-link">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Footer -->
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/footer.php';
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
