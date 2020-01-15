<?php

include 'dbinfo.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$con = mysqli_connect($dbip, $dbusername, $dbpassword);
mysqli_select_db($con, $dbname);

$s = "SELECT * FROM teacherUsers WHERE username = '$username' && password = '$password'";
$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
  $row = mysqli_fetch_array($result);

  $_SESSION['username'] = $username;
  $_SESSION['lastName'] = $row[2];

  header("location:teacherDashboard.php");
  exit();
}
else
{
  header("location:logout.php");
  exit();
}

?>
