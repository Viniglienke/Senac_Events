  <?php

  include "config.php";

  // pegar dados do formulário
  $usuarioDigitado = $_POST["usuario"];
  $senhaDigitada = sha1($_POST["senha"]);

  // cria o query para buscar os dados do banco
  $query = "SELECT * FROM participantes WHERE usuario = '$usuarioDigitado'";

  // executa a pesquisa no banco de dados
  $usuario = mysqli_query($conn, $query);

  $result = mysqli_fetch_array($usuario, MYSQLI_ASSOC);

  // verifica se a senha digitada é igual a do banco
  if ($result["senha"] === $senhaDigitada) {

    // Criando sessão de usuário
    // para verificar se já foi feito o login
    session_start();
    $_SESSION["logged"] = true;
    $_SESSION["usuario"] = $usuarioDigitado;
    $_SESSION["id_participantes"] = $result['id'];

    // Redireciona para a tela de início do sistema 
    header("location:menu.php");
  } else {
    // Redireciona para a tela de autenticação novamente
    // se caso o usuário ou a senha são inválidos
    header("location:index.php?erro=1");
  }

  ?>

  </body>

  </html>