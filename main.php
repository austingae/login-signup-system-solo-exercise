<?php 
  require 'includes/database-handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
</head>
<body>

  <form method='GET'>
    <button type='submit' name='submit' value='submit'>Click</button>
    <!-- the php code in value makes studentID stay in the URL after type=submit button clicked. -->
    <input type='hidden' name='studentID' value="<?php echo htmlspecialchars($_GET['studentID']); ?>" />
  </form>

  <?php 
  //If type=submit button clicked, then go to main.includes.php that includes the studentID
  if (isset($_GET['submit'])) {
    $studentID = $_GET['studentID'];
    header("Location: includes/main.includes.php?studentID=$studentID");
  }
  ?>
</body>
</html>