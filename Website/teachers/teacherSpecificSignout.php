<?php

session_start();
include '../dbinfo.php';

$id = $_POST['id'];
$name = $_POST['name'];
$teacher = $_POST['teacher'];
$place = $_POST['place'];


$con = mysqli_connect($dbip, $dbusername, $dbpassword);
mysqli_select_db($con, $dbname);

if(strcmp($place, "Signing back in") == 0)
{
  $s = "DELETE FROM currentlysignedout WHERE id='$id'";
}
else
{
  $s = "INSERT INTO currentlysignedout (id, name, teacher, place) VALUES('$id', '$name', '$teacher', '$place')";
}
mysqli_query($con, $s);

header("location: teacherSpecificSignoutForm.php");
exit();

?>
