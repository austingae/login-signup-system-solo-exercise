<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
</head>
<body>
  <button><a href='login.php'>Log In</a></button>
  <button><a href='signup.php'>Sign Up</a></button>
  <button><a href='leaderboard.php'>Leaderboard</a></button>
  
  <form action='includes/logout.php' method='GET'>
    <button type='submit' name='logout' value='logout'>Log Out</button>
  </form>

  <?php 
    if (isset($_SESSION['studentName'])) {
      echo "You are logged in " . $_SESSION['studentName'];
    }
    else {
      echo "You are logged out.";
    }
  ?>
</body>
</html>