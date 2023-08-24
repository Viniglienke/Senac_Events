<?php
include 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $usuario = $_POST['usuario'];
    $senha = sha1($_POST['senha']);

    // Verificar se o usuário já existe
    $sql = "SELECT * FROM participantes WHERE usuario = '$usuario' and email = '$email'";
    $result = mysqli_query($conn, $sql);
    $query = "INSERT INTO participantes (nome, email, telefone, usuario, senha) VALUES ('$nome', '$email', '$telefone', '$usuario', '$senha')";


    if (mysqli_num_rows($result) > 0) {

        header("location: index.php?success=0");
        // Usuario já cadastrado!
    } else {
        if (insert($query)) {
            header("location: index.php?success=1");
            // Inserir os dados no banco de dados

        } else {
            header("location: index.php?success=0");
            // Erro ao cadastrar

        }
    }
}
?>