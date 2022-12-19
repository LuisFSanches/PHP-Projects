<?php
  require_once '../Database/Database.php';

  class User {
    private $name='';
    private $username='';
    private $email='';
    private $password='';

    public function __construct($name, $username, $email, $password) {
      $this->name = $name;
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
    }

    public function findByEmail() {
      $query = 'SELECT * from users where email = :email';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':email', $this->email);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return null;
      }
    }

    public function findByUsername() {
      $query = 'SELECT * from users where username = :username';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':username', $this->username);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return null;
      }
    }

    public function create() {
      $query = 'INSERT INTO users (name, username, email, password)
        VALUES(?, ?, ?, ?)';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(1, $this->name);
      $stmt->bindValue(2, $this->username);
      $stmt->bindValue(3, $this->email);
      $stmt->bindValue(4, $this->password);

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }
  }