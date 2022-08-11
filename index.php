<?php
  session_start();
  require("vendor/autoload.php");

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  // Constants:
  define('INCLUDE_PATH_STATIC', 'http://localhost/rede-social-danki-v2/DankiCode/Views/pages/');
  define('INCLUDE_PATH', 'http://localhost/rede-social-danki-v2/');
  define('DB', [
    "host" => 'localhost',
    "dbname" => $_ENV['DB_NAME'],
    "user" => $_ENV['USER'],
    "passwd" => '',
]);

  $app = new DankiCode\Application();
  $app->run();
?>