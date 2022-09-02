<?php 
  require 'database-handler.php';

  //Select num_of_button_clicked from students_stat, and then save it in $originalNumber
  $studentID = $_GET['studentID'];
  $sqlSelectStatement = "SELECT num_of_button_clicked FROM students_stat WHERE studentID = '$studentID';";
  $result = mysqli_query($connection, $sqlSelectStatement);
  $row = mysqli_fetch_assoc($result);
  $originalNumber = $row['num_of_button_clicked'];

  //Add one to $originalNumber, and save that sum in $finalNumber
  $finalNumber = $originalNumber + 1;

  //Update num_of_button_clicked by making num_of_button_clicked = $finalNumber
  $sqlUpdateStatement = "UPDATE students_stat SET num_of_button_clicked = $finalNumber WHERE studentID = '$studentID';";
  mysqli_query($connection, $sqlUpdateStatement);

  //Return back to main.php that includes the studentID
  header("Location: ../main.php?studentID=$studentID");
?>