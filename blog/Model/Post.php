<?php

  require_once '../Database/Database.php';
  class Post {
    private $title;
    private $user_id;
    private $content;

    public function __construct($title, $user_id, $content) {
      $this->$title = $title;
      $this->$user_id = $user_id;
      $this->$content = $content;
    }

    public function index($user_id) {
      $query = 'SELECT * from posts WHERE user_id VALUES(?)';

      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(2, $user_id);
      
      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }
      return null;
    }

    public function create() {
      $query = 'INSERT INTO posts (title, user_id, content) VALUES (?, ? ,?)';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(1, $this->title);
      $stmt->bindValue(2, $this->user_id);
      $stmt->bindValue(3, $this->content);

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }
  }