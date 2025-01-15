<?php
  # Check if form was submitted using POST method
  if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )

  # Include database connection file
  require ('include/connect_db.php');
  
  # Include login helper functions
  require ( 'login_tools.php' ) ;

  # Validate user credentials and get user data
  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

  # If validation successful, start session and store user data
  if ( $check )
  {
    # Initialize session and set user session variables
    session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
  
    
    //echo "hello " . $_SESSION[ 'first_name' ] . " " . $_SESSION[ 'last_name' ];

    # Redirect to products page after successful login
    load ( 'products.php' ) ;
  }
  # Handle failed login attempt
  else 
  { 
    # Store error messages
    $errors = $data; 
  }

  # Close database connection
  mysqli_close( $link ) ;

  # Display login form again if validation failed
  include ( 'login.php' ) ;
?>