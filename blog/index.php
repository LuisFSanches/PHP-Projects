<?php 
  require_once "Model/Post.php"; 
  $postModel = new Post();
  $posts = $postModel->index();

  if (isset($_POST['remove-post'])) {
    $id = $_POST['remove-post'];
    $postModel->destroy($id);
    header("location: index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Home</title>
  <script src="https://kit.fontawesome.com/7546e932d1.js" crossorigin="anonymous"></script>
</head>
<body class="main">
  <header>
    <?php include_once 'components/header.php'; ?>
  </header>
  <section class="posts-section">
    <?php
      array_map(function($post) {
        $id = $post['id'];
        $user_id = $post['user_id'];
        $title = $post['title'];
        $content = $post['content'];
        if (isset($_SESSION['id']) && ($user_id == $_SESSION['id'])) {
          echo(
            "<div class='post-card'>
              <h2>$title</h2>
              <p>$content</p>
              <form method='post'>
                <button 
                  class='remove-button' 
                  type='submit'
                  name='remove-post'
                  value=$id
                >
                  <i class='fa-solid fa-trash'></i>
                </button>
              </form>
            </div>"
          );
        } else {
          echo (
            "<div class='post-card'>
              <h2>$title</h2>
              <p>$content</p>
            </div>"
          );
        }
      }, $posts);
    ?>
  </section>
  <footer>
    <?php include_once 'components/footer.php'; ?>
  </footer>
</body>
</html>
