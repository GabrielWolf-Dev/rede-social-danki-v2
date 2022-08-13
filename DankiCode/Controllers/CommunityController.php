<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;
use DankiCode\Utils;
use DankiCode\Models\UsersModel;

class CommunityController {
  public function index() {
    if(isset($_GET['loggout'])) {
      session_unset();
      session_destroy();
    }

    if(isset($_SESSION['login'])) {
      if(isset($_GET['reqFriendship'])) {
        $idFor = (int) $_GET['reqFriendship'];
        if(UsersModel::reqFriendship($idFor)) {
          Utils::alert('Amizade solicitada com sucesso!');
          Utils::redirect(INCLUDE_PATH.'community');
        } else {
          Utils::alert('Ocorreu um erro ao solicitar a amizade...');
          Utils::redirect(INCLUDE_PATH.'community');
        }
      }

      MainView::render('community');
    } else {
      Utils::redirect(INCLUDE_PATH.'login');
    }
  }
}