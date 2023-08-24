<?php
include 'config.php';

function deletar($tabela, $id)
{
    include 'config.php';

    $query = "DELETE FROM $tabela WHERE id = $id";

    if ($conn->query($query)) {
        return true;
    } else {
        return false;
    }
}

function insert($query)
{
    include 'config.php';

    if ($conn->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getOne($tabela, $id)
{
    include 'config.php';

    $q = "SELECT * FROM $tabela WHERE id = $id";

    if ($res = $conn->query($q)) {
        return $res;
    } else {
        return false;
    }
}

function alterar($tabela, $id, $nome, $dh, $local, $desc)
{
    include 'config.php';

    $q = "UPDATE $tabela SET nome ='$nome', data_hora ='$dh', local = '$local', descricao ='$desc' WHERE id = $id";

    if ($res = $conn->query($q)) {
        return $res;
    } else {
        return false;
    }
}

function mostrar($tabela)
{
    include 'config.php';
    $q = "SELECT * FROM $tabela";

    if ($res = $conn->query($q)) {
        return $res;
    } else {
        return false;
    }
}

function confirmar($tabela, $id)
{
    include 'config.php';

    $q = "SELECT * FROM $tabela WHERE id = $id";

    if ($conn->query($q)) {
        return true;
    } else {
        return false;
    }
}
