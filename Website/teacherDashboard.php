<?php

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
  </body>
</html>
