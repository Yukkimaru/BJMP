<?php include_once('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Account | BJMP</title>

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
      <a class="hiddenanchor" id="signup"></a>

      <div class="login_wrapper">
        
        <div id="register" class="animate form registration_form">
          <section class="login_content">
          <h1>Create Account</h1>
            <form class="form" name="register" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
              <?php include('errors.php'); ?>
              <div>
                <input type="text" class="form-control" placeholder="First Name" name="firstname" required />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Last Name" name="lastname" required />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required/>
              </div>
              <div>
                <label style="margin-right: 50px;"><input type="submit" value="Submit" name="register" class="btn btn-default submit"></label>
              </div>
              </form>

              <div class="clearfix"></div>


            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
