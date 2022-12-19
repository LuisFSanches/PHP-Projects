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
    <h1>Sign In</h1>
    <form action="includes/signin.inc.php" method="post">
      <input type="text" name="email" placeholder="Username / Email">
      <input type="text" name="password" placeholder="password">

      <button type="submit" name="submit">Sign in</button>

    </form>
  </section>

  <footer>
    <?php include_once 'components/footer.php'; ?>
  </footer>
</body>
</html>