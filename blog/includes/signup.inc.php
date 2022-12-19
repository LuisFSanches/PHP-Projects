<?php

if (isset($_POST['submit'])) {
  $name = ($_POST['name']);
  $email = ($_POST['email']);
  $username = ($_POST['username']);
  $password = ($_POST['password']);
  $passwordConfirmation = ($_POST['passwordConfirmation']);

  require_once "../Model/User.php";
  require_once '../validation/UserValidation.php';

  $userModel = new User($name, $username, $email, $password);
  $validateUser = new UserValidation($name, $username, $email, $password, $passwordConfirmation);

  $checkInputs = $validateUser->validateSignUpInputs();
  $checkPasswords = $validateUser->validatePassword();
  $checkEmail = $userModel->findByEmail();
  $checkUsername = $userModel->findByUsername();

  if ($checkInputs !== 'Success') {
    header("location: ../signup.php?error=missingvalues");
    exit();
  }

  if ($checkPasswords !== 'Success') {
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
  }

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