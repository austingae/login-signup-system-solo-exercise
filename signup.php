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
    <input type='text' name='name' placeholder='first and last name' />
    <select name='level'>
      <option value='elementary'>Elementary School</option>
      <option value='middle'>Middle School</option>
      <option value='high'>High School</option>
      <option value='college'>College</option>
    </select>
    <input type='text' name='email' placeholder='your email' />
    <input type='password' name='password' placeholder='your password' />
    <button type='submit' name='submit' value='submit'>Sign Up</button>
  </form>

<?php 
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Sign Up Error Handling If Statements
    if (empty($name) || empty($level) || empty($email) || empty($password)) {
      header("Location: index.php?signuperror=emptyinput");
      die();
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { //https://www.php.net/manual/en/filter.filters.validate.php
        header("Location: index.php?signuperror=invalidemail");
        die();
    }

    if(strlen($password) < 10) {
      header("Location: index.php?signuperror=signuperror=passwordlengthtooshort");
      die();
    }

    $sqlInsertIntoStatement = "INSERT INTO students (name, level, password, email) VALUES ('$name', '$level', '$password', '$email');";
    mysqli_query($connection, $sqlInsertIntoStatement);



  
   
  }

?>

</body>
</html>

<!--
  error handling: check for errors first, and then success
-->