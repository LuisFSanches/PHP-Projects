<?php
  if (isset($_POST["submit"])) {
    $username = ($_POST["username"]);
    $password = ($_POST["password"]);

    require_once "../Model/User.php";
    require_once '../validation/UserValidation.php';

    $userModel = new User();
    $validateUser = new UserValidation($username, $password);
    $checkInputs = $validateUser->validateSignInInputs($username, $password);

    if ($checkInputs !== 'Success') {
      header("location: ../signin.php?error=missingvalues");
      exit();
    }

    $userModel = $userModel->session($username, $password);
    $user = $userModel;

    if ($userModel) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['id'] = $user['id'];
      header("location: ../index.php");
      exit();
    }
    header("location: ../signin.php?error=invalidusernameorpassword");
    exit();
  }
  else {
    header("location: ../signin.php");
    exit();
  }