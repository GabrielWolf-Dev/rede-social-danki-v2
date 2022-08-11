<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;
use DankiCode\MySql;
use DankiCode\Bcrypt;
use DankiCode\Utils;

class LoginController {
  public function index() {
    if(isset($_SESSION['login'])) {
      Utils::redirect(INCLUDE_PATH);
    }

    if(isset($_POST['signIn'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $query = MySql::connect()->prepare("SELECT * FROM users WHERE email = ?");;
      $query->execute([$email]);

      if($query->rowCount() == 0) {
        Utils::alert('Não existe nenhum usuário com este e-mail');
        Utils::redirect(INCLUDE_PATH.'login');
      } else {
        $dataDb = $query->fetch();
        $passwordDb = $dataDb['password'];

        if(Bcrypt::check($password, $passwordDb)) {
          $_SESSION['login'] = $dataDb['email'];

          Utils::alert('Usuário logado com sucesso');
          Utils::redirect(INCLUDE_PATH);
        } else {
          Utils::alert('Senha incorreta!');
          Utils::redirect(INCLUDE_PATH.'login');
        }
      }
    }

    MainView::render('login');
  }
}
?>