<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;
use DankiCode\Utils;
use DankiCode\Bcrypt;
use DankiCode\MySql;
use DankiCode\Models\UsersModel;

class RegisterController {
  public function index() {
    if(isset($_SESSION['login'])) {
      Utils::redirect(INCLUDE_PATH);
    }

    if(isset($_POST['register'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        Utils::alert('E-mail inválido!');
        Utils::redirect(INCLUDE_PATH.'register');
      } else if(strlen($password) < 6) {
        Utils::alert('Senha deve ser maior que 6 caracteres.');
        Utils::redirect(INCLUDE_PATH.'register');
      }else if(UsersModel::emailExists($email)) {
        Utils::alert('Este e-mail já existe, por favor insira um e-mail não registrado');
        Utils::redirect(INCLUDE_PATH.'register');
      } else {
        $password = Bcrypt::hash($password);
        $query = MySql::connect()->prepare("INSERT INTO users VALUES (null, ?, ?, ?)");
        $query->execute([$name, $email, $password]);

        Utils::alert('Registrado com sucesso!');
        Utils::redirect(INCLUDE_PATH);
      }
    }

    MainView::render('register');
  }
}
?>