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

  public static function listPendingFriend() {
    $pdo = MySql::connect();
    $listFriends = $pdo->prepare("SELECT * FROM friendchip WHERE received = ? AND status = 0");
    $listFriends->execute([$_SESSION['id']]);

    return $listFriends->fetchAll();
  }

  public static function getUserById($id) {
    $pdo = MySql::connect();
    $user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $user->execute([$id]);

    return $user->fetch();
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

  public static function updateSolicitationFriend($sended, $status) {
    $pdo = MySql::connect();

    if($status == 0) {
      $deleteSolicitation = $pdo->prepare("DELETE FROM friendchip WHERE sended = ? AND received = ? AND status = 0");
      $deleteSolicitation->execute([$sended, $_SESSION['id']]);
    } else if($status == 1) {
      $accept = $pdo->prepare("UPDATE friendchip SET status = 1 WHERE sended = ? AND received = ?");
      $accept->execute([$sended, $_SESSION['id']]);

      if($accept->rowCount() == 1) {
        return true;
      } else {
        return false;
      }
    }
  }
}