<?php
  session_start();
  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['id'];

    if (empty($user_id)) {
      header("location: ../index.php?error=invaliduser");
      exit();
    }

    require_once "../Model/User.php";
    require_once "../Model/Post.php";
    require_once '../validation/PostValidation.php';

    $database = new Database();
    $userModel = new User();
    $postModel = new Post();
    $validatePost = new PostValidation();
    $checkUser = $userModel->findById($user_id);
    $checkInputs = $validatePost->validateInputs($title, $content);

    if (!$checkUser) {
      header("location: ../index.php?error=invaliduser");
      exit();
    }

    if ($checkInputs !== 'Success') {
      header("location: ../newpost.php?error=missingvalues");
      exit();
    }

    $postModel->create($user_id, $title, $content);
    header("location: ../index.php");
    exit();
  }

?>