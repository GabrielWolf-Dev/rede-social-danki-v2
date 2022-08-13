<?php

namespace DankiCode\Controllers;

use DankiCode\Views\MainView;
use DankiCode\MySql;
use DankiCode\Utils;
use DankiCode\Bcrypt;

class AccountController {
  public function index() {
    if(isset($_GET['loggout'])) {
      session_unset();
      session_destroy();
    }

    if(isset($_SESSION['login'])) {
      if(isset($_POST['save'])) {
        $pdo = MySql::connect();
        $name = strip_tags($_POST['name']);
        $password = $_POST['password'];

        if($name == '' || strlen($name) < 3) {
          Utils::alert("Insira um nome");
          Utils::redirect(INCLUDE_PATH.'account');
        }
        
        if($password !== '') {
          $password = Bcrypt::hash($password);
          $update = $pdo->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
          $update->execute([$name, $password, $_SESSION['id']]);
          $_SESSION['name'] = $name;

          Utils::alert("Seu perfil foi atualizado com sucesso e a senha alterada!");
          Utils::redirect(INCLUDE_PATH.'account');
        } else {
          $update = $pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
          $update->execute([$name, $_SESSION['id']]);
          $_SESSION['name'] = $name;

          Utils::alert("Seu perfil foi atualizado com sucesso!");
          Utils::redirect(INCLUDE_PATH.'account');
        }

        if($_FILES['file']['tmp_name'] == '') {
          $file = $_FILES['file'];
          $fileExt = explode('.', $file['name']);
          $fileExt = $fileExt[count($fileExt) - 1];

          if($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg') {
            $size = intval($file['size'] / 1024);

            if($size <= 300) {
              $idImg = uniqid().'.'.$fileExt;
              $updateImg = $pdo->prepare("UPDATE users SET img = ? WHERE id = ?");
              $updateImg->execute([$idImg , $_SESSION['id']]);
              move_uploaded_file($file['tmp_name'], 'C:\xampp\htdocs\rede-social-danki-v2\DankiCode\Views\pages\uploads/'.uniqid());
              Utils::alert("Seu perfil foi atualizado junto com a foto!");
              Utils::redirect(INCLUDE_PATH.'account');
            } else {
              Utils::alert("Erro ao processar o seu arquivo");
              Utils::redirect(INCLUDE_PATH.'account');
            }
          }
        } else {
          Utils::alert("Erro ao processar o seu arquivo");
          Utils::redirect(INCLUDE_PATH.'account');
        }
      }

      MainView::render('account');
    } else {
      Utils::redirect(INCLUDE_PATH.'login');
    }
  }
}