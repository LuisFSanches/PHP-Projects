<?php
  // require_once "Database/Database.php";
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__.'/Database/Database.php');
  class Post {

    public function index() {
      $query = 'SELECT * from posts';
      $stmt = Database::getConn()->prepare($query);
      $stmt->execute();
      
      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }
      return null;
    }

    public function show($user_id) {
      $query = 'SELECT * from posts where user_id = :user_id';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':user_id', $user_id);
      $stmt->execute();
      
      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }
      return null;
    }

    public function create($user_id, $title, $content) {
      $query = 'INSERT INTO posts (title, user_id, content) VALUES (?, ? ,?)';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(1, $title);
      $stmt->bindValue(2, $user_id);
      $stmt->bindValue(3, $content);

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }

    public function destroy($id) {
      $query = 'DELETE from posts where id = :id';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(':id', $id);

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }
  }