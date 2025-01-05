<?php # CONNECT TO MySQL DATABASE.

# Connect/Link  on 'localhost' .
$link = mysqli_connect('localhost','root','','mktime_shop'); 

  if (!$link) 
  { 
      # Otherwise fail gracefully and explain the error. 
      die('Could not connect to MySQL: ' . mysqli_error()); 
  } 
 
?>