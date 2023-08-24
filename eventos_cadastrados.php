<html>

<head>
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
                                <a class="nav-link active" aria-current="page" href="voucher.php">Vouchers</a>
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
        <h1>Eventos Cadastrados</h1>
        <div id="erro">
            <div id='alert-msg' class="alert visually-hidden" role="alert"><span id="text-alert"></span></div>
            <?php
            // Arquivo de configuração do banco de dados
            include 'config.php';

            // Consulta para obter todos os eventos cadastrados
            $consulta = "SELECT * FROM eventos";
            $result = mysqli_query($conn, $consulta);

            // consulta para mostrar os eventos cadastrados
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data = $row['data_hora']; // Data e hora no formato datetime
                    // Criar um objeto DateTime com base na string da data
                    $datetime = new DateTime($data);
                    // Formatar a data no padrão brasileiro
                    $data_formatada = $datetime->format("d/m/Y H:i:s");
                    echo "<div id='evento_" . $row['id'] . "'>";
                    echo "<p>Nome: " . $row['nome'] . "</p>";
                    echo "<p>Data: " . $data_formatada . "</p>";
                    echo "<p>Local: " . $row['local'] . "</p>";
                    echo "<p class='descricao' >Descrição: " . $row['descricao'] . "</p>";
                    echo 'Envie um convite para:<input type="email" id="email"><input type="submit" onClick="enviarEmail(); "value="Enviar">';
                    echo "<hr>";

                    // Verificar se o usuário já confirmou a presença nesse evento
                    $id_evento = $row['id'];
                    $id_participante = $_SESSION['id_participantes'];

                    $consulta_confirmacao = "SELECT * FROM voucher WHERE id_evento = $id_evento AND id_participante = $id_participante";
                    $result_confirmacao = mysqli_query($conn, $consulta_confirmacao);

                    if (mysqli_num_rows($result_confirmacao) > 0) {
                        // O usuário já confirmou a presença, não exibir o botão
                        echo '<div class="alert alert-success" role="alert">
            Presença confirmada!
          </div>';
                        echo "<hr>";
                    } else {
                        // O usuário ainda não confirmou a presença, exibir o botão
                        echo '<a class="btn btn-success" id="evento_confirmado_' . $row['id'] . '" href="#" onclick="confirmarPresenca(' . $row['id'] . ')">Confirmar presença </a>';
                        echo "<hr>";
                    }


                    // verifica se o usuário logado é igual ao usuario que criou o evento, caso seja, é liberado os botões de excluir e alterar o evento
                    if ($_SESSION['id_participantes'] === $row['criador']) {

                        echo ' <form action="alterar_evento.php" method="POST">
                    <input type="hidden" name="id" value="' . $row['id'] . '" />
                    <button type="submit" class="btn btn-info">Alterar evento</button>
                </form>';
                        echo "<hr>";

                        echo '<a class="btn btn-danger" href="#" onclick="excluirEvento(' . $row['id'] . ')">Excluir evento</a>';
                    }
                    echo "<hr>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum evento cadastrado.</p>";
            }

            // Fechar a conexão com o banco de dados
            mysqli_close($conn);
            ?>
        </div>

        <script>
            function enviarEmail() {

                var email = document.getElementById('email').value;
                alert('Convite enviado com sucesso para ' + email);
                document.getElementById('email').value = '';

            };

            function excluirEvento(id) {
                fetch('apagar_evento.php', {
                        method: "POST",
                        headers: {
                            "Content-Type": 'application/json'
                        },
                        body: JSON.stringify(id)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status == true) {
                            document.getElementById('evento_' + id).classList.add('visually-hidden');
                        } else {
                            alert("Erro, existe um voucher vinculado a este evento!");
                        }
                        // limpar a tela do evento excluido
                    }).catch(error => {
                        console.log(error);
                    })

            };

            function confirmarPresenca(id) {
                var elementAlert = document.getElementById('alert-msg');
                var elementTextAlert = document.getElementById('text-alert');
                fetch('confirmar_presenca.php', {
                        method: "POST",
                        headers: {
                            "Content-Type": 'application/json'
                        },
                        body: JSON.stringify(id)
                    })
                    .then(response => response.json())
                    .then(data => {

                        if (data.status == true) {
                            document.getElementById('evento_confirmado_' + id).classList.add('visually-hidden');
                            elementAlert.classList.remove('visually-hidden');
                            elementAlert.classList.add('alert-success');
                            elementTextAlert.innerText = 'Presença confirmada!'
                        } else {
                            elementAlert.classList.remove('visually-hidden');
                            elementAlert.classList.add('alert-danger');
                            elementTextAlert.innerText = 'Erro ao confirmar presença!'
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