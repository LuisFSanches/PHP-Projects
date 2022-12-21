<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__.'/Database/Database.php');
  class User {
    public function findById($id) {
      $query = 'SELECT * from users where id = :id';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':id', $id);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return null;
      }
    }

    public function findByEmail($email) {
      $query = 'SELECT * from users where email = :email';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':email', $email);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return null;
      }
    }

    public function findByUsername($username) {
      $query = 'SELECT * from users where username = :username';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':username', $username);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return null;
      }
    }

    public function create($name, $username, $email, $password) {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $query = 'INSERT INTO users (name, username, email, password)
        VALUES(?, ?, ?, ?)';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(1, $name);
      $stmt->bindValue(2, $username);
      $stmt->bindValue(3, $email);
      $stmt->bindValue(4, $hashed_password);

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }

    public function session($username, $password) {
      $query = 'SELECT * from users where username = :username OR email = :username';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue( ':username', $username);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $user["password"];
        $checkPassword = password_verify($password, $hashed_password);

        if ($checkPassword === false) {
          return null;
        }
        return $user;
      }
      return null;
    }
  }