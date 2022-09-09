<?php 
  session_start();
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

    //Prepared Statements using SQL and PHP
    $sqlSelectStatement = "SELECT * FROM students WHERE name=?;";

    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sqlSelectStatement);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    //Result
    $result = mysqli_stmt_get_result($stmt);

    //While Loop Through the Result!
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['studentID'] = $row['studentID'];
        $_SESSION['studentName'] = $row['name'];

        header("Location: index.php?login=success");





        //$studentID = $row['studentID'];
        //header("Location: main.php?studentID=$studentID");
      }
    }  
  }
?>
</body>
</html>

<!--
First Way Using Prepared Statements:

    //Prepared Statements using SQL and PHP
    $sqlSelectStatement = "SELECT * FROM students WHERE name=?;";

    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sqlSelectStatement);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    //Result
    $result = mysqli_stmt_get_result($stmt);

    //While Loop Through the Result!
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['password'] == $password) {
        echo 'Hello There!' . $password;
      }
    }



Second Way:

    $sqlSelectStatement = "SELECT * FROM students WHERE name='$name';";
    $result = mysqli_query($connection, $sqlSelectStatement);
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['password'] == $password) {
        echo "Hello, There!" . $password;
      }
    }
-->