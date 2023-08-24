<?php
include 'funcoes.php';

$id = json_decode(file_get_contents('php://input'), true);

// funcão para deletar o evento selecionado pelo id
if (deletar('eventos', $id)) {
    exit(json_encode(array('status' => true)));
} else {
    exit(json_encode(array('status' => false)));
}
?>