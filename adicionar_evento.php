<?php
// Arquivo de configuração do banco de dados
include 'config.php';
session_start();

// Obter os valores enviados pelo formulário
$nome = $_POST['nome'];
$data = $_POST['data_hora'];
$local = $_POST['local'];
$descricao = $_POST['descricao'];
$criador = $_SESSION['id_participantes']; // Atribui o usuário logado como criador do evento

// Inserir o evento no banco de dados
$sql = "INSERT INTO eventos (nome, data_hora, local, descricao, criador) VALUES ('$nome', '$data', '$local', '$descricao', '$criador')";
if (mysqli_query($conn, $sql)) {
    
    header("location: eventos.php?success=1"); 
} else {
    header("location: eventos.php?success=0");
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
