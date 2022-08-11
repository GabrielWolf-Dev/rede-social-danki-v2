<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/authentication.css">
  <title>Página de Registro</title>
</head>
<body>
  <div class="bg"></div>
  <main class="box-login">
    <div class="box-login__desc">
      <img
        class="box-login__desc__logo"
        src="<?php echo INCLUDE_PATH_STATIC ?>images/logo.svg"
        alt="Logo"
      />
      <p class="box-login__desc__content">
        Conecte-se com seus amigos e expanda seus aprendizados com a rede social Danki Code.
      </p>
    </div>

    <form method="post" class="box-login__form">
      <fieldset>
        <input
          class="input"
          name="name"
          type="text"
          placeholder="Digite o seu nome..."
        />
      </fieldset>
      <fieldset class="my-20">
        <input
          class="input"
          name="email"
          type="email"
          placeholder="Email ou telefone"
        />
      </fieldset>
      <fieldset>
        <input
          class="input"
          name="password"
          type="password"
          placeholder="Senha"
        />
      </fieldset>
      <button name="register" class="btn-primary mtop-20">Registrar</button>
      <a href="<?php echo INCLUDE_PATH ?>login" class="btn-secondary mtop-20">Já tenho uma conta</a>
    </form>
  </main>
</body>
</html>