<?php

include '../dbinfo.php';
session_start();
if(!isset($_SESSION['username']))
{
  header("location:teacherLogin.html");
  exit();
}

$lastName = $_SESSION['lastName'];

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sign in / Sign out form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
</head>
  <body>
    <h1 id = "head">
      Sign in / Sign out - <?php echo$lastName; ?>
    </h1>
    </div>
    <div class = "wrapper">
    <main>
      <div id = "space">
        <form method="post" action="teacherSpecificSignout.php">
          <label for="id">* Student ID:</label>
          <input type = "text" id = "id" name="id" required><br>
          <?php echo"<input type='hidden' name='teacher' value='{$lastName}'"; ?>
          <label for="reason">* Why are you signing out?</label>
          <select id="place" name="place" required>
            <option value = "Restroom">Restroom</option>
            <option value = "Counselor">Counselor</option>
            <option value = "Nurse">Nurse</option>
            <option value = "Media Center">Media Center</option>
            <option value = "Leaving early">Leaving early</option>
            <option value = "Drink of water">Drink of water</option>
            <option value = "Signing back in">Signing back in</option>
          </select><br>
          <input type="submit">
          </form>
        </div>
    </main>
  </div>
    <footer>
      <p>This site was created by the Loveland INTERalliance Chapter.</p>
    </footer>
  </body>
</html>
