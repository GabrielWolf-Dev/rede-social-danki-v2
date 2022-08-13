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

      <section class="friends-box">
        <h2 class="friends-box__title">Amigos</h2>

        <ul class="list-items">
          <?php
            $listFriends = \DankiCode\Models\UsersModel::listFriends();
            foreach ($listFriends as $key => $value) {
            
          ?>
            <li class="list-items__box">
            <img
              class="list-items__img"
              src="<?php echo INCLUDE_PATH_STATIC ?>images/user.jpg"
              alt="User example"
            />

            <div>
              <h4 class="list-items__name"><?php echo $value['name'] ?></h4>
              <p class="list-items__email"><?php echo $value['email'] ?></p>
            </div>
            </li>
          <?php } ?>
        </ul>
      </section>

      <section class="community-box">
        <h2 class="community-box__title">Comunidade</h2>

        <ul class="list-items">
          <?php
            $community = \DankiCode\Models\UsersModel::listCommunity();
            $pdo = \DankiCode\MySql::connect();

            foreach ($community as $key => $value) {
              $verifyFriend = $pdo->prepare("SELECT * FROM friendchip WHERE (sended = ? AND received = ? AND status = 1) OR (sended = ? AND received = ? AND status = 1)");
              $verifyFriend->execute([$value['id'], $_SESSION['id'], $_SESSION['id'], $value['id']]);

              if($verifyFriend->rowCount() == 1) {
                continue;
              }

              if($value['id'] == $_SESSION['id']) {
                continue;
              }
          ?>
            <li class="list-items__box">
              <img
                class="list-items__img"
                src="<?php echo INCLUDE_PATH_STATIC ?>images/user.jpg"
                alt="User example"
              />

              <div>
              <h4 class="list-items__name"><?php echo $value['name'] ?></h4>
                <p class="list-items__email"><?php echo $value['email'] ?></p>
                <?php if(\DankiCode\Models\UsersModel::existsReqFirendchip($value['id'])) { ?>
                  <a class="list-items__link-solicitation" href="<?php echo INCLUDE_PATH ?>community?reqFriendship=<?php echo $value['id'] ?>">Solicitar Amizade</a>
                <?php } else { ?>
                  <a style="color: orange; border: 1px solid orange;" class="list-items__link-solicitation" href="javascript:void(0)">Pedido pendente</a>
                <?php } ?>
              </div>
            </li>
          <?php } ?>
        </ul>
      </section>
    </main>
  </div>

  <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menuAside.js"></script>
</body>
</html>