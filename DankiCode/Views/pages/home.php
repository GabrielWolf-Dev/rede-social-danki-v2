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

    <main class="feed">
      <button class="feed-menu">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </button>

      <button class="feed-menu-mobile">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </button>

      <div class="feed__posts">
        <form class="feed__posts__form-post" method="post">
          <textarea required name="post_content" class="feed__posts__textarea" placeholder="No que você está pensando?"></textarea>
          <button class="feed__posts__btn-submit" name="post-feed" type="submit">Enviar</button>
        </form>
        <?php
          $retrievePosts = \DankiCode\Models\HomeModel::retrieveFriendsPosts();
          foreach ($retrievePosts as $key => $value) {
        ?>
        <article class="feed__post">
        <header class="feed__post__header">

        <?php

if(!isset($value['me']) && $value['img'] == ''){

?>

<img class="feed__post__photo-user" src="<?php echo INCLUDE_PATH_STATIC ?>images/user.jpg" />

<?php }else if(!isset($value['me'])){ ?>

<img class="feed__post__photo-user" src="<?php echo INCLUDE_PATH_STATIC ?>images/<?php echo $value['img'] ?>" />

<?php } ?>



<?php

if(isset($value['me']) && $_SESSION['img'] == ''){

?>

<img class="feed__post__photo-user" src="<?php echo INCLUDE_PATH_STATIC ?>images/user.jpg" />

<?php }else if(isset($value['me'])){ ?>

<img class="feed__post__photo-user" src="<?php echo INCLUDE_PATH_STATIC ?>images/<?php echo $_SESSION['img'] ?>" />

<?php } ?>
          <div>
            <h3 class="feed__post__name-user"><?php echo $value['user'] ?></h3>
            <time class="feed__post__time-post"><?php echo date('d/m/Y H:i:s', strtotime($value['date'])); ?></time>
          </div>
        </header>
        
        <main class="feed__post__content">
          <p class="feed__post__text"><?php echo $value['content'] ?></p>
        </main>

        <footer class="feed__footer">
          <button class="feed__footer__button">
            <img
              class="feed__footer__icon"
              src="<?php echo INCLUDE_PATH_STATIC ?>images/like.svg"
              alt="Link Button"
            />
            <span class="feed__footer__text-btn">20</span>
          </button>
          <button class="feed__footer__button">
            <img
              class="feed__footer__icon"
              src="<?php echo INCLUDE_PATH_STATIC ?>images/comment.svg"
              alt="Comment Button"
            />
            <span class="feed__footer__text-btn">300</span>
          </button>
        </footer>
        </article>
        <?php } ?>
      </div>

      <aside class="feed__solicitations">
        <h2 class="feed__solicitations__title">Solicitações de amizade:</h2>

        <ul class="feed__solicitations__list">
          <?php
            $pendingFriends = \DankiCode\Models\UsersModel::listPendingFriend();

            foreach ($pendingFriends as $key => $value) {
              $userInfo = \DankiCode\Models\UsersModel::getUserById($value['sended']);
          ?>
            <li class="feed__solicitations__user">
            <img
              class="feed__solicitations__user__photo"
              src="<?php echo INCLUDE_PATH_STATIC ?>images/photo.png"
              alt="Photo user solicitation"
            />

            <legend>
              <h4 class="feed__solicitations__user__name"><?php echo $userInfo['name'] ?></h4>
              <div>
                <a class="feed__solicitations__user__link" href="<?php INCLUDE_PATH ?>?acceptFriend=<?php echo $userInfo['id'] ?>">Aceitar</a>
                 | 
                <a class="feed__solicitations__user__link" href="<?php INCLUDE_PATH ?>?refuseFriend=<?php echo $userInfo['id'] ?>">Recusar</a>
              </div>
            </legend>
            </li>
          <?php } ?>
        </ul>
      </aside>
    </main>
  </div>

  <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menuAside.js"></script>
</body>
</html>