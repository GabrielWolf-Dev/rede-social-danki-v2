<?php

namespace DankiCode\Models;

use DankiCode\MySql;
use DankiCode\Models\UsersModel;

class HomeModel {
  public static function postFeed($post) {
    $pdo = MySql::connect();
    $post = strip_tags($post);

    if(preg_match('/\[image/', $post)) {
      $post = preg_replace('/(.*?)\[image=(.*?)\]/', '<p>$1</p><img src="$2" />', $post);
    } else {
      $post = '<p>'.$post.'</p>';
    }


    $postFeed = $pdo->prepare("INSERT INTO posts VALUES (null, ?, ?, ?)");
    $postFeed->execute([$_SESSION['id'], $post, date('Y-n-d H:i:s', time())]);

    $updateUser = $pdo->prepare("UPDATE users SET last_post = ? WHERE id = ?");
    $updateUser->execute([date('Y-n-d H:i:s', time()), $_SESSION['id']]);
  }

  public static function retrieveFriendsPosts() {
    $pdo = MySql::connect();
    $friendchips = $pdo->prepare("SELECT * FROM friendchip WHERE (sended = ? AND status = 1) OR (received = ? AND status = 1)");
    $friendchips->execute(array($_SESSION['id'], $_SESSION['id']));
    $friendchips = $friendchips->fetchAll();

    $confirmedFriendchips = array();
    foreach ($friendchips as $key => $value) {
      if($value['sended'] == $_SESSION['id']){
       $confirmedFriendchips[] = $value['received'];
      }else{
        $confirmedFriendchips[] = $value['sended'];
      }
    }

    $listFriends = array();
    foreach ($confirmedFriendchips as $key => $value) {
      $listFriends[$key]['id'] = UsersModel::getUserById($value)['id'];
      $listFriends[$key]['name'] = UsersModel::getUserById($value)['name'];
      $listFriends[$key]['email'] = UsersModel::getUserById($value)['img'];
      $listFriends[$key]['img'] = UsersModel::getUserById($value)['email'];
      $listFriends[$key]['last_post'] = UsersModel::getUserById($value)['last_post'];
    }

    usort($listFriends, function($a,$b){
      if(strtotime($a['last_post']) >  strtotime($b['last_post'])){
        return -1;
      }else{
        return +1;
      }
    });

    $posts = [];
    foreach ($listFriends as $key => $value) {
      $lastPost = $pdo->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY date DESC");
      $lastPost->execute(array($value['id']));

      if($lastPost->rowCount() >= 1){
        $lastPost = $lastPost->fetch();
        $posts[$key]['user'] = $value['name'];
        $posts[$key]['img'] = $value['img'];
        $posts[$key]['date'] = $lastPost['date'];
        $posts[$key]['content'] = $lastPost['post'];
      }
    }

    $me = $pdo->prepare("SELECT * FROM users WHERE id = $_SESSION[id]");
    $me->execute();
    $me = $me->fetch();

    if(isset($posts[0])){
      if(strtotime($me['last_post']) > strtotime($posts[0]['date'])  ){
        $lastPost = $pdo->prepare("SELECT * FROM posts WHERE user_id = $_SESSION[id] ORDER BY date DESC");
        $lastPost->execute();
        $lastPost = $lastPost->fetchAll()[0];

        array_unshift($posts, array('data'=>$lastPost['date'],'content'=>$lastPost['post'],'me'=>true  ));
      }
    }

    return $posts;
  }
}