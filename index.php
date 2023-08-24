<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>

<body>

  <?php
  include 'login.html';
  // mostra o erro caso o usuário não esteja cadastrado ou errou algum dado do login
  if (isset($_GET['erro']) && $_GET['erro'] == 1) {
    echo "<p>Usuário e/ou senha incorretos.<p>";
  }

  if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<div class= 'login'><p>Cadastro concluído com sucesso!</p></div>";
  } else if (isset($_GET['success']) && $_GET['success'] == 0) {
    echo "<div class= 'login'><p>Usuario já cadastrado!</p></div>";
  };

  ?>

</body>

</html>
<style>
  .login {
    color: white;
  }
</style>