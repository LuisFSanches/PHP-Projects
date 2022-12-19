<?php
  class Database {
    private static $connection;

    public static function getConn() {
      $host = '127.0.0.1';
      $db_name = 'blog';
      $user = 'admin';
      $password = 'adminspassword';

      if (!isset(self::$connection)) {
        self::$connection = new \PDO('mysql:host='.$host.'; dbname='.$db_name, $user, $password);
      }

      return self::$connection;
    }
  }