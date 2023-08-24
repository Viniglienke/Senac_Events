<!DOCTYPE html>
<html>
<title>Gerenciamento de Eventos</title>
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
                                <a class="nav-link active" aria-current="page" href="eventos_cadastrados.php">Eventos Cadastrados</a>
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

        <div id="mens">
            <?php

            // mostra se o evento foi cadastrado ou não através do GET(url)
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo "<div><p>Evento cadastrado com sucesso!</div></p>";
            } else if (isset($_GET['success']) && $_GET['success'] == 0) {
                echo "Erro ao cadastrar o evento.";
            }
            ?>
        </div>
        <div id="cad">

            <h1>Cadastrar Eventos</h1>
            <form action="adicionar_evento.php" method="POST">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Evento</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="mb-3">
                    <label for="data_hora" class="form-label">Data e hora</label>
                    <input type="datetime-local" class="form-control" id="data_hora" name="data_hora">
                </div>
                <div class="mb-3">
                    <label for="local" class="form-label">Local</label>
                    <input type="text" class="form-control" id="local" name="local">
                </div>
                <div class="mb-3">
                    <label for="Descrição" class="form-label">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
                </div>

                <input class="btn btn-primary" type="submit" value="Cadastrar Evento"><br><br>

            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </div>
</body>

</html>