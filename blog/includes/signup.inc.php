<?php

if (isset($_POST['submit'])) {
  $name = ($_POST['name']);
  $email = ($_POST['email']);
  $username = ($_POST['username']);
  $password = ($_POST['password']);
  $passwordConfirmation = ($_POST['passwordConfirmation']);

  require_once "../Model/User.php";
  $userModel = new User($name, $username, $email, $password);
  $checkEmail = $userModel->findByEmail();
  $checkUsername = $userModel->findByUsername();

  if ($checkEmail) {
    header("location: ../signup.php?error=emailalreadyregistered");
    exit();
  }

  if ($checkUsername) {
    header("location: ../signup.php?error=usernamealreadyregistered");
    exit();
  }

  $userModel->create();

} else {
  header("location: ../signup.php");
  exit();
}