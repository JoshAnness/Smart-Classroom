<?php

include '../dbinfo.php';
session_start();
if(!isset($_SESSION['username']))
{
  header("location:teacherLogin.html");
  exit();
}

$username = $_SESSION['username'];
$lastName = $_SESSION['lastName'];

?>
<!DOCTYPE>
<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="cStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher Dashboard</title>
    <body>
        <br>
        <div class="container">
            <div class="row">
                <h1 class ="col-12 col-sm-6 text-center">Smith</h1>
                <a href="teacherSpecificSignoutForm.php" class="col-6 col-sm-3 text-center buffer-top"><button class="btn btn-info">My Signout Form</button></a>
                <a href="logout.php" class="col-6 col-sm-3 text-center buffer-top"><button class="btn btn-logout">Logout</button></a>

            </div>
            <hr class="buffer-top buffer-bottom">
            <div class="row buffer-top buffer-bottom">
                <a href="teacherDashboard.php" class="col-6 text-center padding-large-vertical"><button class="btn btn-primary ">My Students</button></a>
                <a href="allStudentsTeacherDashboard.php" class="col-6 text-center"><button class="btn btn-primary">All Students</button></a>
            </div>

            <div class="table-responsive">
              <?php
              //Display all signed out students

              $con = mysqli_connect($dbip, $dbusername, $dbpassword);
              mysqli_select_db($con, $dbname);

              $s = "SELECT * FROM currentlysignedout";

              $result = mysqli_query($con, $s);

              echo "<table class='table table-borderless'>";
              echo "<tr>";
              echo "<th>ID</th>";
              echo "<th>Student Name</th>";
              echo "<th>Teacher Name</th>";
              echo "<th>Location</th>";
              echo "</tr>";

              while($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['teacher']."</td>";
                echo "<td>".$row['place']."</td>";
                echo "</tr>";
              }

              echo "</table>";

              ?>
            </div>
        </div>
  </body>
</html>
