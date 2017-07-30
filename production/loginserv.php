<?php
include_once ('config.php');
$errors='';
if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    $errors = "Email or Password is invalid";
  }
  else {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query = mysqli_query($db, "SELECT * FROM accounts_bjmp WHERE password = '$password' AND email = '$email'");
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
      header("Location: dashboard.php");
    }
    else {
      $errors = "Email of password is invalid";
    }
    mysqli_close($db);
  }
}
?>