<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Sign In</title>
</head>
<body class="main">
  <header>
    <?php include_once 'components/header.php'; ?>
  </header>

  <section>
    <h2>Sign In</h2>
    <form action="includes/signin.inc.php" method="post">
      <input type="text" name="username" placeholder="Username / Email">
      <input type="password" name="password" placeholder="password">

      <button type="submit" name="submit">Sign in</button>

    </form>
    <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "missingvalues") {
          echo "<p class='error-message'> Invalid username or password! </p>";
        }
        else if ($_GET["error"] == "invalidusernameorpassword") {
          echo "<p class='error-message'> Invalid username or password!</p>";
        }
      }
    ?>
  </section>

  <footer>
    <?php include_once 'components/footer.php'; ?>
  </footer>
</body>
</html>