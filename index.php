<?php
  session_start();
  require("vendor/autoload.php");

  $app = new DankiCode\Application();
  $app->run();
?>