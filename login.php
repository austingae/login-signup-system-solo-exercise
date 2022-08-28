<?php 
  require 'includes/database-handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
</head>
<body>
  <form method='POST'>
    <input type='text' name='name' placeholder='enter your name' />
    <input type='password' name='password' placeholder='enter your password' />
    <button type='submit' name='submit' value='submit'>Log In</button>
  </form>

<?php

  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
  
    $sqlSelectStatement = "SELECT * FROM students;";
    $result = mysqli_query($connection, $sqlSelectStatement);

    $loggedInStatus = false;
  
    while ($row = mysqli_fetch_array($result)) {
      if ($row[1] == $name && $row[3] == $password) {
        echo 'Hello ' . $row[1] . ', here are some ' . $row[2] . ' courses for you.';

        $loggedInStatus = true;
      }
    }
    
    if ($loggedInStatus == false) {
      echo 'Please try again.';
    }
  
  }


?>
</body>
</html>

<!--
  0. a database-handler to create a connection to the database
  1. create a form
  2. using php and sql, select all info in the rows; then go through each row to check if
  $name and $password == the name and password of that row
-->