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
          <li class="navbar__item-list">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            <a href="<?php echo INCLUDE_PATH ?>">Feed</a>
          </li>
          <li class="navbar__item-list">
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="<?php echo INCLUDE_PATH ?>account">Perfil</a>
          </li>
          <li class="navbar__item-list">
            <i class="fa fa-users" aria-hidden="true"></i>
            <a href="<?php echo INCLUDE_PATH ?>community">Amigos</a>
          </li>
          <li class="navbar__item-list">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <a href="?loggout">Deslogar</a>
          </li>
        </ul>
      </nav>
    </aside>