<?php
include 'funcoes.php';

// pega os dados recebidos via POST do formulário presente no arquivo alterar_evento.php e os coloca em variáveis 
$id = $_POST['id'];
$nome = $_POST['nome'];
$dh = $_POST['data_hora'];
$local = $_POST['local'];
$desc = $_POST['descricao'];

// função para alterar os eventos cadastrados
if (alterar('eventos', $id, $nome, $dh, $local, $desc)) {
    header('location: eventos_cadastrados.php');
} else {
    header('location: eventos_cadastrados.php');
}
?>