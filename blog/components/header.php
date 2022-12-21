<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/navbar.css">
  <title>Document</title>
</head>
<body>
  <nav class="nav-bar">
    <?php 
      if (isset($_SESSION["username"])) {
        $username = $_SESSION['username'];
        echo "<h1>
          $username - Blog
        </h1>";
      } else {
        echo "<h1>Blog</h1>";
      }
    ?>

    <div class="nav-items">
        <ul>
          <li><a href="/blog/">Home</a></li>
          <?php
            
            if (isset($_SESSION["username"])) {
              echo "<li><a href=''>New Post</a></li>";
              echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
            } else {
              echo "<li><a href='/blog/signin.php'>Sign in</a></li>";
              echo "<li><a href='/blog/signup.php'>Sign Up</a></li>";
            }
          ?>
        </ul>
      </div>
  </nav>
</body>
</html>