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
  <body>
    <?php echo"<h1>{$lastName}</h1>"; ?>
    <br>
    <a href="logout.php"><button>Logout</button></a>
    <a href="teacherSpecificSignoutForm.php"><button>My Signout Form</button></a>
    <br>
    <br>
    <a href="teacherDashboard.php"><button>My Students</button></a>
    <a href="allStudentsTeacherDashboard.php"><button>All Students</button></a>
    <?php
    //Display all signed out students

    $con = mysqli_connect($dbip, $dbusername, $dbpassword);
    mysqli_select_db($con, $dbname);

    $s = "SELECT * FROM currentlysignedout";

    $result = mysqli_query($con, $s);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Student Name</th>";
    echo "<th>Teacher Name</th>";
    echo "<th>Location</th>";
    echo "</tr>";

    while($row = mysqli_fetch_array($result))
    {
      if(strcmp($row['teacher'], $lastName) == 0)
      {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['teacher']."</td>";
        echo "<td>".$row['place']."</td>";
        echo "</tr>";
      }
    }

    echo "</table>";

    ?>

  </body>
</html>
