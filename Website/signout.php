<?php

session_start();
include 'dbinfo.php';

$id = $_POST['id'];
$name = $_POST['name'];
$teacher = $_POST['teacher'];
$place = $_POST['place'];


$con = mysqli_connect($dbip, $dbusername, $dbpassword);
mysqli_select_db($con, $dbname);

$s = "INSERT INTO currentlysignedout (id, name, teacher, place) VALUES('$id', '$name', '$teacher', '$place')";
mysqli_query($con, $s);

header("location: index.html");
exit();

?>
