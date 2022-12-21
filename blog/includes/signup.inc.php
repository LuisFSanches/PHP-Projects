<?php

if (isset($_POST['submit'])) {
  $name = ($_POST['name']);
  $email = ($_POST['email']);
  $username = ($_POST['username']);
  $password = ($_POST['password']);
  $passwordConfirmation = ($_POST['passwordConfirmation']);

  require_once "../Model/User.php";
  require_once '../validation/UserValidation.php';

  $userModel = new User();
  $validateUser = new UserValidation();

  $checkInputs = $validateUser->validateSignUpInputs($name, $username, $email, $password, $passwordConfirmation);
  $checkEmailFormat= $validateUser->validateEmail($email);
  $checkUsernameFormat = $validateUser->validateUsername($username);
  $checkPasswords = $validateUser->validatePassword($password, $passwordConfirmation);
  $checkEmail = $userModel->findByEmail($email);
  $checkUsername = $userModel->findByUsername($username);

  if ($checkInputs !== 'Success') {
    header("location: ../signup.php?error=missingvalues");
    exit();
  }

  if ($checkEmailFormat !== 'Success') {
    header("location: ../signup.php?error=invalidemail");
    exit();
  }

  if ($checkUsernameFormat !== 'Success') {
    header("location: ../signup.php?error=invalidusername");
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

  $userModel->create($name, $username, $email, $password);
  if ($userModel) {
    header("location: ../index.php");
  }

} else {
  header("location: ../signup.php");
  exit();
}