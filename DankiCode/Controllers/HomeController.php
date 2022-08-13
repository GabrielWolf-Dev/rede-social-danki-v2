<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;
use DankiCode\Utils;
use DankiCode\Models\UsersModel;
use DankiCode\Models\HomeModel;

class HomeController {
  public function index() {
    if(isset($_GET['loggout'])) {
      session_unset();
      session_destroy();
    }

    if(isset($_SESSION['login'])) {
      if(isset($_GET['refuseFriend'])) {
        $idSended = (int) $_GET['refuseFriend'];

        UsersModel::updateSolicitationFriend($idSended, 0);
        Utils::alert("Amizade recusada");
        Utils::redirect(INCLUDE_PATH);
      } else if(isset($_GET['acceptFriend'])) {
        $idSended = (int) $_GET['acceptFriend'];

        if(UsersModel::updateSolicitationFriend($idSended, 1)) {
          Utils::alert("Amizade aceita");
          Utils::redirect(INCLUDE_PATH);
        } else {
          Utils::alert("Ops... Um erro ocorreu!");
          Utils::redirect(INCLUDE_PATH);
        }
      }

      if(isset($_POST['post-feed'])) {
        if($_POST['post_content'] == '' || strlen($_POST['post_content'] < 10)) {
          Utils::alert("Campos vazios não são permitidos!");
          Utils::redirect(INCLUDE_PATH);
        } else {
          HomeModel::postFeed($_POST['post_content']);
          Utils::alert("Post feito com sucesso!");
          Utils::redirect(INCLUDE_PATH);
        }
      }

      MainView::render('home');
    } else {
      Utils::redirect(INCLUDE_PATH.'login');
    }
  }
}
?>