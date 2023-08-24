<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Evento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
  <div class="container">
    <div id="interface">



      <?php
      $id = $_POST['id'];


      // fazer um select para pegar o evento que tem o id que veio do formulario
      include 'funcoes.php';

      $evento_retornado = getOne('eventos', $id)->fetch_assoc();


      ?>

      <form action="update_event.php" method="POST">
        <input type="hidden" id="id" name="id" value="<?= $evento_retornado['id'] ?>"><br>
        <label for="fname">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?= $evento_retornado['nome'] ?>"><br>
        <label for="fname">Data e hora:</label><br>
        <input type="datetime-local" id="data_hora" name="data_hora" value="<?= $evento_retornado['data_hora'] ?>"><br>
        <label for="fname">Local:</label><br>
        <input type="text" id="local" name="local" value="<?= $evento_retornado['local'] ?>"><br>
        <label for="fname">Descrição:</label><br>
        <textarea name="descricao" id="descricao" cols="100" rows="10" value="<?= $evento_retornado['descricao'] ?>"></textarea><br><br>
        <button type="submit" class="btn btn-info" value="Alterar">Alterar evento</button>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>