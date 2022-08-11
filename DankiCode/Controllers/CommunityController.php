<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;

class CommunityController {
  public function index() {
    MainView::render('community');
  }
}