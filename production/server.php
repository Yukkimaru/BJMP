<?php
$email = "";
$lastname = "";
$errors = array();

include_once('config.php');

  if (isset($_POST['register'])) {
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);
    
    if (empty($firstname)) {
      array_push($errors, "Firstname is required");
    }
    if (empty($lastname)) {
      array_push($errors, "Lastname is required");
    }
    if (empty($email)) {
      array_push($errors, "Email is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }

    if ($password != $confirmpassword) {
      array_push($errors, "Password not match");
    }

    if (count($errors) == 0) {
      $password = md5($password);
      $sql = "INSERT INTO accounts_bjmp (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
      mysqli_query($db, $sql);
      $_SESSION['lastname'] = $lastname;
      $_SESSION['success'] = "You are now logged in";
      header('location: login.php');
    }

  }



?>