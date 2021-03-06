<?php
include_once('config.php');
session_start();
if (isset($_SESSION["email"])) {
  header("location: dashboard.php");
}

if (isset($_POST["login"])) {
  if (empty($_POST["email"]) && empty($_POST["password"])) {
    echo '<script>alert("Both Fields are required")</script>';
  }
  else {
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    $password = md5($password);
    $query = "SELECT * FROM accounts_bjmp WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
      $_SESSION['email'] = $email;
      header("location: dashboard.php");
    }
    else {
      echo '<script>alert("Wrong User Details")</script>';
    }
  }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log-in! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="submit">Log in</button>
              </div>

              <div class="clearfix"></div>

               
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
