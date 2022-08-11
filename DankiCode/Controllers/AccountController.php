<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;

class AccountController {
  public function index() {
    MainView::render('account');
  }
}