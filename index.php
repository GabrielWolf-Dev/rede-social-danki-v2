<?php
  session_start();
  require("vendor/autoload.php");

  define('INCLUDE_PATH_STATIC', 'http://localhost/rede-social-danki-v2/DankiCode/Views/pages/');
  define('INCLUDE_PATH', 'http://localhost/rede-social-danki-v2/');

  $app = new DankiCode\Application();
  $app->run();
?>