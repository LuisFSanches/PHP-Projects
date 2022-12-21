<?php
  require_once '../Database/Database.php';
  class User {

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
      echo $hashed_password;
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
        echo 'chegou aqui';
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($user);
        $hashed_password = $user["password"];
        $checkPassword = password_verify($password, $hashed_password);

        if ($checkPassword === false) {
          return null;
        }
        return $this;
      }
      return null;
    }
  }