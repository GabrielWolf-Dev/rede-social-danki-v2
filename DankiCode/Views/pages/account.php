<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/app.css">
  <title>Bem vindo <?php echo $_SESSION['name'] ?>!</title>
</head>
<body>
  <div class="grid">
    <?php include('includes/sidebar.php'); ?>

    <main class="feed feed-account">
      <button class="feed-menu">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </button>

      <button class="feed-menu-mobile">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </button>
      
      <h1>Perfil:</h1>
      <div class="edit-account">
        <?php
          if($_SESSION['img'] == '') {
            echo '<img src="'.INCLUDE_PATH_STATIC.'images/user.jpg" alt="User image" />';
          } else {
            echo '<img src="'.INCLUDE_PATH_STATIC.'images/'.$_SESSION['img'].'" alt="User image" />';
          }
        ?>
        <form method="post" enctype="multipart/form-data">
          <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" />
          <input type="password" name="password" placeholder="Sua nova senha..." />
          <input type="file" name="file" />

          <button type="submit" name="save">Salvar</button>
        </form>
      <div>
    </main>
  </div>

  <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menuAside.js"></script>
</body>
</html>