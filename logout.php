<?php

# Start the session to access session data
session_start();

# Remove all session variables
session_unset();

# Destroy the session
session_destroy();

# Redirect to home page
header('Location: index.php');

# Stop script execution after redirect
exit();

?>