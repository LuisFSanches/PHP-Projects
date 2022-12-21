<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>New Post</title>
</head>
<body class="main">
  <header>
    <?php include_once 'components/header.php'; ?>
  </header>

  <section>
    <h2>New Post</h2>
    <form action="includes/newPost.inc.php" method="post" class="form">
      <input type="text" name="title" placeholder="Title"/>
      <textarea rows="8" name="content">Content...</textarea>
      <button type="submit" name="submit">Create</button>
    </form>
    
  </section>

  <footer>
    <?php include_once 'components/footer.php'; ?>
  </footer>
</body>
</html>