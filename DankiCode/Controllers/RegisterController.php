<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;

class RegisterController {
  public function index() {
    MainView::render('register');
  }
}
?>