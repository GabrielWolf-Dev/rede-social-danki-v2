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

  public static function listCommunity() {
    $pdo = MySql::connect();
    $query = $pdo->prepare("SELECT * FROM users");
    $query->execute();

    return $query->fetchAll();
  }

  public static function reqFriendship($idFor) {
    $pdo = MySql::connect();
    $verifyFriendchip = $pdo->prepare("SELECT * FROM friendchip WHERE (sended = ? AND received = ?) OR (sended = ? AND received = ?)");
    $verifyFriendchip->execute([$_SESSION['id'], $idFor, $idFor, $_SESSION['id']]);

    if($verifyFriendchip->rowCount() == 1) {
      return false;
    } else {
      $insertFriendchip = $pdo->prepare("INSERT INTO friendchip VALUES (null, ?, ?, 0)");

      if($insertFriendchip->execute([$_SESSION['id'], $idFor])) {
        return true;
      }
    }
  }

  public static function existsReqFirendchip($idFor) {
    $pdo = MySql::connect();
    $verifyFriendchip = $pdo->prepare("SELECT * FROM friendchip WHERE (sended = ? AND received = ?) OR (sended = ? AND received = ?)");
    $verifyFriendchip->execute([$_SESSION['id'], $idFor, $idFor, $_SESSION['id']]);

    if($verifyFriendchip->rowCount() == 1) {
      return false;
    } else {
      return true;
    }
  }
}