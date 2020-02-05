<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="cStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
  <body>
    <br><br>
    <div class="container">

      <div>
        <h1 style="height:1.5em; padding-top:.125em;">Admin Login</h1>
      </div>

      <form class="form-horizontal text-left" action="adminLoginProcess.php" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="control-label"><h3>Username</h3></label>
          <div class="col-sm-12">
            <input type="text" class="form-control input-lg" id="username" placeholder="Username" name="username">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="control-label"><h3>Password</h3></label>
          <div class="col-sm-12">
            <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password">
          </div>
        </div>
        <div class="form-group">

          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </div>
      </form>
    </div>

  </body>
</html>
