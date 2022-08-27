<?php
  require 'includes/database-handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
</head>
<body>
  <form method='POST'>
    <input type='text' name='username' placeholder='type in your username' />
    <input type='password' name='password' placeholder='type in your password' />
    <input type='text' name='email' placeholder='type in your email' />
    <button type='submit' name='submit' value='submit'>Submit</button>
  </form>

  <?php 
    if(isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];

      $sqlInsertIntoStatement = "INSERT INTO people (username, password, email) VALUES ('$username', '$password', '$email');";
      $result = mysqli_query($conn, $sqlInsertIntoStatement);

      header ('Location: index.php');
    }
  ?>
</body>
</html>