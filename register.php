<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MKTIME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <?php
         include $_SERVER['DOCUMENT_ROOT'] . '/codespace/MKTIME/include/navbar.php';
    ?>
    <?php 
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
        {
            # Connect to the database.
            require ('include/connect_db.php');
  
            # Initialize an error array.
            $errors = array();
            
            # Check for a first name.
            if ( empty( $_POST[ 'first_name' ] ) )
            { 
                $errors[] = 'Enter your first name.' ; 
            } else
            { 
                $first_name = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; 
            }

            # Check for a last name.
            if (empty($_POST['last_name'])) 
            {
                $errors[] = 'Enter your last name.';
            } else 
            {
                $last_name = mysqli_real_escape_string($link, trim($_POST['last_name']));
            }

            # Check for an email address.
            if (empty($_POST['email'])) 
            {
                $errors[] = 'Enter your email address.';
            } else 
            {
                $email = mysqli_real_escape_string($link, trim($_POST['email']));
            }

            # Check for a password and matching input passwords.
            if (!empty($_POST['pass1']))
            {
                if ($_POST['pass1'] != $_POST['pass2'])
                { 
                    $errors[] = 'Passwords do not match.'; 
                } else
                { 
                    $pass = mysqli_real_escape_string($link, trim($_POST['pass1'])); 
                }
            }
            else 
            { 
                $errors[] = 'Enter your password.'; 
            }

            # Check if email address already registered.
            if (empty($errors))
            {
                $query = "SELECT user_id FROM users WHERE email='$email'" ;
                $result = @mysqli_query ($link, $query);
                
                if (mysqli_num_rows($result) != 0 ) 
                {
                    $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>';
                }
            }
            # On success register user inserting into 'users' database table.
            if (empty($errors)) 
            {
                $query = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	                      VALUES ('$first_name', '$last_name', '$email', '$pass', NOW() )";
                $result = @mysqli_query ( $link, $query ) ;
                
                if ($result)
                { 
                    echo '<p>You are now registered.</p><a class="alert-link" href="login.php">Login</a>'; 
                }
	  
                # Close database connection.
                mysqli_close($link); 
                exit();
            }
            # Or report errors.
            else 
            {
                echo '<div class="alert alert-danger text-center" role="alert" >';
                echo '<h4 class="alert-heading">The following error(s) occurred:</h4>';
                //echo '<ul>';
                foreach ($errors as $msg) 
                { 
                    echo "<p>$msg</p>"; 
                }
              //  echo '</ul>';
                echo '<p class="mb-0">Please try again.</p>';
                echo '</div>';
                # Close database connection.
                mysqli_close( $link );
            }  


       



        }
?>
    <!-- Register Form -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100 justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Create a new account</h1>
                        <form action="register.php" method="POST">
                            <div class="row">
                                <!-- First Name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="firstName" placeholder="Enter your first name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" required>
                                </div>

                                <!-- Last Name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Enter your last name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="name@example.com" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="row">
                                <!-- Password -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" name="pass1" class="form-control" id="inputPassword" placeholder="Enter password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="pass2" class="form-control" id="inputConfirmPassword" placeholder="Re-enter password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-dark w-100">Sign Up</button>
                            <p class="mt-3 text-center">Already have an account? <a href="login.php" class="alert-link">Log In</a></p>
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
