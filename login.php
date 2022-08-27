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
    <input type='text' name='username' placeholder='your username' />
    <input type='password' name='password' placeholder='your password' />
    <button type='submit' name='submit' value='submit'>Log In</button>
  </form>

<?php 
  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlSelectStatement = "SELECT username, password FROM people;";
    $result = mysqli_query($conn, $sqlSelectStatement);

    $successfullyLoggedIn = false;
    //this while loop loops through every row in $result
    while ($row = mysqli_fetch_assoc($result)) { //the while loop runs until $row = null. mysqli_fetch_assoc($result) = null if there is no more rows 
      if ($row['username'] == $username && $row['password'] == $password) {
        echo 'You have successfully logged in.';

        $successfullyLoggedIn = true;
        break;
      }
    }

    //if successfullyLoggedIn continues to be false, then print out to screen: Please try again.
    if($successfullyLoggedIn == false) {
      echo 'Please try again.';
    }





  }
?>
</body>
</html>

<!--
  Source: 
  https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
-->