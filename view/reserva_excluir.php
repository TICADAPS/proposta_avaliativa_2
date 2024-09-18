<?php

require_once("config.php");
require_once '../controller/reservaController.php';

$reserva = new ReservaController();

// salvar dados
$reserva->excluirController();

?>