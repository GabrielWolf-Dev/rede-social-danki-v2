<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;

class HomeController {
  public function index() {
    if(isset($_SESSION['login'])) {
      MainView::render('home');
    } else {
      MainView::render('login');
    }
  }
}
?>