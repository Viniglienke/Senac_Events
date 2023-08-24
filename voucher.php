<!DOCTYPE html>
<html>

<head>
  <title>Voucher</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
  <div class="container">
    <div id="interface">

      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SENAC EVENTS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="menu.php">Início</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="eventos.php">Cadastrar Eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="eventos_cadastrados.php">Eventos Cadastrados</a>
              </li>
            </ul>
            <?php
            session_start();
            if (isset($_SESSION['logged'])) :
            ?>
              <a class="btn btn-outline-dark me-2" href="index.php"> <?php echo $_SESSION['usuario']; ?> (Sair) </a>
            <?php
            else :
              header('location:index.php');
            endif;
            ?>

          </div>
        </div>
      </nav>
    </div>

    <h1>Seus Vouchers</h1>
    <table>
      <div>
        <div id='alert-msg' class="alert visually-hidden" role="alert"><span id="text-alert"></span></div>
        <?php
        include 'config.php';
        $usuarioDigitado = $_SESSION["id_participantes"];


        $consulta = "SELECT voucher.id, eventos.nome as nome_evento, eventos.data_hora, eventos.local, eventos.descricao, participantes.nome as nome_participante
        FROM voucher
        JOIN eventos ON eventos.id = voucher.id_evento
        JOIN participantes ON participantes.id = voucher.id_participante
        WHERE voucher.id_participante = '$usuarioDigitado'";

        $result = mysqli_query($conn, $consulta);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $data = $row['data_hora']; // Data e hora no formato datetime
            // Criar um objeto DateTime com base na string da data
            $datetime = new DateTime($data);
            // Formatar a data no padrão brasileiro
            $data_formatada = $datetime->format("d/m/Y H:i:s");
            echo "<div id='voucher_" . $row['id'] . "'>";
            echo "<p>Nome do evento: " . $row['nome_evento'] . "</p>";
            echo "<p>Data e hora: " . $data_formatada . "</p>";
            echo "<p>Local: " . $row['local'] . "</p>";
            echo "<p class='descricao'> Descrição: " . $row['descricao'] . "</p>";
            echo "<p> Nome do participante: " . $row['nome_participante'] . "</p>";
            echo '<a class="btn btn-danger" id= "voucher_" href="#" onclick="excluirVoucher(' . $row['id'] . ')">Excluir voucher</a>';
          }
          echo "</div>";
        } else {
          echo "<tr><td colspan='5'>Você não possui vouchers.</td></tr>";
        }
        ?>
      </div>
  </div>
  </table>

  <script>
    function excluirVoucher(id) {
      var elementAlert = document.getElementById('alert-msg');
      var elementTextAlert = document.getElementById('text-alert');
      fetch('apagar_voucher.php', {
          method: "POST",
          headers: {
            "Content-Type": 'application/json'
          },
          body: JSON.stringify(id)
        })
        .then(response => response.json())
        .then(data => {

          if (data.status == true) {
            document.getElementById('voucher_' + id).classList.add('visually-hidden');
            elementAlert.classList.remove('visually-hidden');
            elementAlert.classList.add('alert-success');
            elementTextAlert.innerText = 'Voucher excluído com sucesso!'
          } else {
            elementAlert.classList.remove('visually-hidden');
            elementAlert.classList.add('alert-danger');
            elementTextAlert.innerText = 'Erro ao excluir o voucher!'
          }




          // limpar a tela do evento excluido
        }).catch(error => {
          console.log(error);
        })

    };
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>