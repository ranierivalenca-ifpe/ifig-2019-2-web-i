<?php
include '../config.php';
include '../functions.php';

$data = file(PAR_FILENAME);

$row = $_GET['row'] ?? false;

if ($row === false) {
    redirect('index.php?e=Erro desconhecido');
}

unset($data[$row]);

file_put_contents(PAR_FILENAME, implode('', $data));

redirect('index.php?m=Dado removido');
?>