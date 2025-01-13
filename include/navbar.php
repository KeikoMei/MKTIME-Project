  <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">MKTIME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="collectionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Our Collection
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="collectionDropdown">
                            <li><a class="dropdown-item " href="products.php">All products</a></li>
                            <li><a class="dropdown-item " href="products.php?category=men">Men's Collection</a></li>
                            <li><a class="dropdown-item" href="products.php?category=women">Women's Collection</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    
                    <?php
                        # Access session.
                        if ( !isset( $_SESSION[ 'user_id' ] ) )
                        {
                            session_start() ;
                        }                       

                        
                        if ( !isset( $_SESSION[ 'user_id' ] ) ) 
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                        }
                        else
                        { 
                            $first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : '';
                            $last_name = isset($_SESSION['last_name']) ? $_SESSION['last_name'] : '';
                            echo '<li class="nav-item"><span class="nav-link text-light ms-3">Welcome, ' . htmlspecialchars($first_name) . ' ' . htmlspecialchars($last_name) . '</span></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="/codespace/MKTIME/basket.php"><i class="bi bi-cart3"></i></a></li>';
                            
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';

                           
                            
                        }
                        ?>





                    
                </ul>
            </div>
        </div>
    </nav>

  