<?php

namespace DankiCode\Models;

use DankiCode\MySql;

class UsersModel {
  public static function emailExists($email) {
    $pdo = MySql::connect();
    $query = $pdo->prepare("SELECT email FROM users WHERE email = ?");
    $query->execute([$email]);

    if($query->rowCount() == 1)
      return true;
    else
      return false;
  }
}