<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;

class LoginController {
  public function index() {
    MainView::render('login');
  }
}
?>