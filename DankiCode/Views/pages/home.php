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
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/feed.css">
  <title>Feed</title>
</head>
<body>
  <div class="grid">
    <aside class="navbar">
      <header class="navbar__header">
        <img
          class="navbar__logo"
          src="<?php echo INCLUDE_PATH_STATIC ?>images/logo.svg"
          alt="logo"
        />
        <button class="navbar__btn-menu">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
      </header>

      <nav class="navbar__nav">
        <h3 class="navbar__title">Menu</h3>
        <ul>
          <li class="navbar__item-list navbar__item-list--active">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            Feed
          </li>
          <li class="navbar__item-list">
            <i class="fa fa-user" aria-hidden="true"></i>
            Perfil
          </li>
          <li class="navbar__item-list">
            <i class="fa fa-users" aria-hidden="true"></i>
            Amigos
          </li>
        </ul>
      </nav>
    </aside>
    <main class="feed">
     <button class="feed-menu">
      <i class="fa fa-bars" aria-hidden="true"></i>
     </button>
    </main>
  </div>

  <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menuAside.js"></script>
</body>
</html>