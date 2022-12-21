<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Sign Up</title>
</head>
<body class="main">
  <header>
    <?php include_once 'components/header.php'; ?>
  </header>

  <section>
    <h2>Sign Up</h2>
    <form action="includes/signup.inc.php" method="post" class="form">
      <input type="text" name="name" placeholder="Full name">
      <input type="text" name="email" placeholder="email">
      <input type="text" name="username" placeholder="username">
      <input type="password" name="password" placeholder="password">
      <input type="password" name="passwordConfirmation" placeholder="password confirmation">

      <button type="submit" name="submit">Sign up</button>
    </form>
    <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "missingvalues") {
          echo "<p class='error-message'> Missing values. </p>";
        }
        else if ($_GET["error"] == "invalidemail") {
          echo "<p class='error-message'> Choose a proper email. </p>";
        }
        else if ($_GET["error"] == "invalidusername") {
          echo "<p class='error-message'> Choose a proper username. </p>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
          echo "<p class='error-message'> Password don't match. </p>";
        }
        else if ($_GET["error"] == "emailalreadyregistered") {
          echo "<p class='error-message'> Email already registered. </p>";
        }
        else if ($_GET["error"] == "usernamealreadyregistered") {
          echo "<p class='error-message'> Username already registered.</p>";
        }
        else if ($_GET["error"] == "none") {
          echo "<p class='error-message'> You have signed up!</p>";
        }
      }
    ?>
  </section>

  <footer>
    <?php include_once 'components/footer.php'; ?>
  </footer>
</body>
</html>