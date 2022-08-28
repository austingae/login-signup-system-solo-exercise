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
    <input type='password' name='password' placeholder='your password' />
    <button type='submit' name='submit' value='submit'>Sign Up</button>
  </form>

<?php 
  $name = $_POST['name'];
  $level = $_POST['level'];
  $password = $_POST['password'];

  $sqlInsertIntoStatement = "INSERT INTO students (name, level, password) VALUES ('$name', '$level', '$password');";
  mysqli_query($connection, $sqlInsertIntoStatement);

  header('Location: index.php');
?>
</body>
</html>

<!--
  0. a separate php file with the database connection - Yes. 
  1. create a form - Yes. 
  2. using php and sql, insert the form's data into the mysql database - yes. 
-->