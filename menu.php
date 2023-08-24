<!DOCTYPE html>
<html>

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
  <div class="sair">
    <?php

    session_start();
    if (isset($_SESSION['logged'])) {
    ?>
      <button type="button" class="btn btn-outline-warning" href="index.php">
        <li><a class="sair" href="index.php"> <?php echo $_SESSION['usuario']; ?>(Sair)</a></li>
      </button>


    <?php
    } else {
      header('location:index.php');
    };
    ?>
  </div>

  <div class="menu-container">
    <label for="menu-toggle" class="menu-open"><span></span></label>
    <label for="menu-toggle" class="menu-close"></label>
    <div class="menu">

      <ul>
        <li class="box"><a href="menu.php">Página Inicial</a></li>
        <li class="box"><a href="eventos.php">Cadastro de Eventos</a></li>
        <li class="box"><a href="eventos_cadastrados.php">Eventos Cadastrados</a></li>
        <li class="box"><a href="voucher.php">Vouchers</a></li>
      </ul>
    </div>
  </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Caprasimo&display=swap');

  .menu li.box {
    font: 50px;
    background-color: blue;
    color: blue;
    padding: 40px 20px;
    top: 10px;
    background: black;
    text-align: center;
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
    border-radius: 1px;
    position: middle;
    overflow: scroll;
    transition: 0.3s;
    border-radius: 20px;
  }

  .box {
    font-family: "Caprasimo", sans-serif;
    font-size: 36px;
  }

  .menu li.box:hover {
    transform: scale(1.1);
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
  }

  .sair li {
    padding: 20px 2px;
    top: 100px;
    text-align: top;
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
    border-radius: 1px;
    position: top;
    overflow: scroll;
    transition: 0.3s;
    border-radius: 20px;
  }

  .sair li.sair:hover {
    transform: scale(1.1);
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
  }

  .sair {
    text-align: right;
  }

  body {
    background-color: #00ffea31;
  }
</style>