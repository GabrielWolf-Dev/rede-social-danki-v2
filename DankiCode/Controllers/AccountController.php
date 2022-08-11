<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;
use DankiCode\Utils;

class AccountController {
  public function index() {
    if(isset($_GET['loggout'])) {
      session_unset();
      session_destroy();
    }

    if(isset($_SESSION['login'])) {
      MainView::render('account');
    } else {
      Utils::redirect(INCLUDE_PATH.'login');
    }
  }
}