<?php

namespace DankiCode\Models;

use DankiCode\MySql;

class HomeModel {
  public static function postFeed($post) {
    $pdo = MySql::connect();
    $post = strip_tags($post);

    $postFeed = $pdo->prepare("INSERT INTO posts VALUES (null, ?, ?, ?)");
    $postFeed->execute([$_SESSION['id'], $post, date('Y-n-d H:i:s', time())]);

    $updateUser = $pdo->prepare("UPDATE users SET last_post = ? WHERE id = ?");
    $updateUser->execute([date('Y-n-d H:i:s', time()), $_SESSION['id']]);
  }
}