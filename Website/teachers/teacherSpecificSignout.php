<?php

session_start();
include '../dbinfo.php';
date_default_timezone_set('America/New_York');

$id = $_POST['id'];
$name = $_POST['name'];
$teacher = $_POST['teacher'];
$place = $_POST['place'];


$con = mysqli_connect($dbip, $dbusername, $dbpassword);
mysqli_select_db($con, $dbname);

if(strcmp($place, "Signing back in") == 0)
{
	$s = "DELETE FROM currentlysignedout WHERE id='$id'";
	mysqli_query($con, $s);

	$time = date("h:i:sa");
	$date = date("m-d-Y");
	
	$blank = '';
	$s = "UPDATE signoutlog SET timein = '$time', datein = '$date' WHERE id='$id' && timein='$blank' && datein='$blank'";
	mysqli_query($con, $s);
}
else
{
	$s = "INSERT INTO currentlysignedout (id, name, teacher, place) VALUES('$id', '$name', '$teacher', '$place')";
	mysqli_query($con, $s);

	$time = date("h:i:sa");
	$date = date("m-d-Y");
	$s = "INSERT INTO signoutlog (id, name, teacher, place, timeout, dateout) VALUES('$id', '$name', '$teacher', '$place', '$time', '$date')";
	mysqli_query($con, $s);
}

header("location: teacherSpecificSignoutForm.php");
exit();

?>
