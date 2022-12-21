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
    <form action="includes/newForm.inc.php" method="post" class="form">
      <input type="text" name="name" placeholder="Full name">
      <input type="text" name="email" placeholder="email">
      <input type="text" name="username" placeholder="username">
      <input type="password" name="password" placeholder="password">
      <input type="password" name="passwordConfirmation" placeholder="password confirmation">

      <button type="submit" name="submit">Sign up</button>
    </form>
    
  </section>

  <footer>
    <?php include_once 'components/footer.php'; ?>
  </footer>
</body>
</html>