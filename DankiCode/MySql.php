<?php

namespace DankiCode;

use Exception;
use PDO;

class MySql {

  private static $pdo;

  public static function connect() {
    if(self::$pdo == null){
      try {
          self::$pdo = self::$pdo = new PDO('mysql:host='.DB['host'].';dbname='.DB['dbname'], DB['user'], DB['passwd'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(Exception $e) {
          echo 'Erro ao conectar no banco de dados!';
          error_log($e->getMessage());
      }
    }

    return self::$pdo;
  }
}