<?php
  require 'includes/database-handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaderboard</title>
</head>
<body>
  <?php 
    //Get the columns -- students.name and students_stat.num_of_button_clicked -- and then join those two columns together into one table.
    $sqlSelectAllStatement = "SELECT students.name, students_stat.num_of_button_clicked FROM students INNER JOIN students_stat ON students.studentID = students_stat.studentID ORDER BY num_of_button_clicked DESC;";
    $result = mysqli_query($connection, $sqlSelectAllStatement);

    //Make a HTML table inside PHP echo.

    //Table Header
    echo "<table>
            <tr>
              <th>Name</th>
              <th>Num Of Button Clicked</th>
            </tr>";

    //Table Body With the Data
    while ($row = mysqli_fetch_assoc($result)) {
      echo '
            <tr>
              <td>'.$row['name'].'</td>
              <td>'.$row['num_of_button_clicked'].'</td>
            </tr>
              ';
    }
    //Table Ending
    echo "</table>";
  ?>
</body>
</html>