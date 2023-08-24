<?php
include 'config.php';
include 'funcoes.php';

session_start();

$id_evento = json_decode(file_get_contents('php://input'), true);
$id_participante = $_SESSION["id_participantes"];
$query = "INSERT INTO voucher (id_evento, id_participante) VALUES ($id_evento, $id_participante)";


// funcão para confirmar a presença no evento usando id do evento e participante
if (insert($query)) {
    exit(json_encode(array('status' => true)));
} else {
    exit(json_encode(array('status' => false)));
}
?>
