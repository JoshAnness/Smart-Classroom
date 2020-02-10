<?php

session_start();
include 'dbinfo.php';
date_default_timezone_set('America/New_York');

$id = $_POST['id'];
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
	//Get student name
	$s = "SELECT * FROM students WHERE id = '$id'";
	$result = mysqli_query($con, $s);
	$num = mysqli_num_rows($result);
	if($num == 1)
	{
	  $row = mysqli_fetch_array($result);

	  $name = $row[2].", ".$row[1];
	}
	else
	{
	  header("location:index.html");
	  exit();
	}
	
	$time = date("h:i:sa");
	$s = "INSERT INTO currentlysignedout (id, name, teacher, place, timeout) VALUES('$id', '$name', '$teacher', '$place', '$time')";
	mysqli_query($con, $s);
	
	$date = date("m-d-Y");
	$s = "INSERT INTO signoutlog (id, name, teacher, place, timeout, dateout) VALUES('$id', '$name', '$teacher', '$place', '$time', '$date')";
	mysqli_query($con, $s);
}

header("location: index.html");
exit();

?>
