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
    <?php 
      if(isset($_GET['name'])) {
        $name = $_GET['name'];
        echo '<input type="text" name="name" placeholder="first and last name" value="'.$name.'" />';
      }
      else {
        echo "<input type='text' name='name' placeholder='first and last name' />";
      }

    ?>

    <select name="level">
      <option value="elementary" <?php if ($_GET["level"] == "elementary") echo "selected='selected'"?>>Elementary School</option>
      <option value="middle"<?php if ($_GET["level"] == "middle") echo "selected='selected'"?>>Middle School</option>
      <option value="high"<?php if ($_GET["level"] == "high") echo "selected='selected'"?>>High School</option>
      <option value="college"<?php if ($_GET["level"] == "college") echo "selected='selected'"?>>College</option>
     </select>

    <?php
      if(isset($_GET['email'])) {
        $email = $_GET['email'];
        echo '<input type="text" name="email" placeholder="email" value="'.$email.'" />';
      }
      else {
        echo '<input type="text" name="email" placeholder="email" />';
      }
    ?>
    <input type='password' name='password' placeholder='your password' />
    <button type='submit' name='submit' value='submit'>Sign Up</button>
  </form>

<?php 
    $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    if (is_int(strpos($fullURL, "signuperror=emptyinput"))) { //If "signuperror=emptyinput" exists, then...
      echo "You have one or more empty input fields.";
    }
    elseif (is_int(strpos($fullURL, "signuperror=invalidemail"))) {
      echo "You have an invalid email format.";
    }
    elseif (is_int(strpos($fullURL, "signuperror=passwordlengthtooshort"))) {
      echo "Your password is too short.";
    }
    else {
      echo '';
    }
    
?>

<?php 



  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //Sign Up Error Handling If Statements
    if (empty($name) || empty($level) || empty($email) || empty($password)) {
      header("Location: signup.php?signuperror=emptyinput&name=$name&level=$level&email=$email");
      die();
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //https://www.php.net/manual/en/filter.filters.validate.php
        header("Location: signup.php?signuperror=invalidemail&name=$name&level=$level&email=$email");
        die();
    }
    elseif (strlen($password) < 10) {
      header("Location: signup.php?signuperror=passwordlengthtooshort&name=$name&level=$level&email=$email");
      die();
    }
    else {
      $sqlInsertIntoStatement = "INSERT INTO students (name, level, password, email) VALUES (?,?,?,?);";
      $stmt = mysqli_stmt_init($connection);
      mysqli_stmt_prepare($stmt, $sqlInsertIntoStatement);
      mysqli_stmt_bind_param($stmt, "ssss", $name, $level, $hashedPassword, $email);
      mysqli_stmt_execute($stmt);


      $num_of_button_clicked = 0;
      $sqlInsertIntoStatement2 = "INSERT INTO students_stat (num_of_button_clicked) VALUES (?);";
      $stmt2 = mysqli_stmt_init($connection);
      mysqli_stmt_prepare($stmt2, $sqlInsertIntoStatement2);
      mysqli_stmt_bind_param($stmt2, "i", $num_of_button_clicked);
      mysqli_stmt_execute($stmt2);
    }
  }
?>


</body>
</html>


<!--
First Way Using Prepared Statements:

      $sqlInsertIntoStatement = "INSERT INTO students (name, level, password, email) VALUES (?,?,?,?);";
      $stmt = mysqli_stmt_init($connection);
      mysqli_stmt_prepare($stmt, $sqlInsertIntoStatement);
      mysqli_stmt_bind_param($stmt, "ssss", $name, $level, $password, $email);
      mysqli_stmt_execute($stmt);



Second Way:

      $sqlInsertIntoStatement = "INSERT INTO students (name, level, password, email) VALUES ('$name', '$level', '$password', '$email');";
      mysqli_query($connection, $sqlInsertIntoStatement);
-->
