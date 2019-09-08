<?php
require '../config.php';
require '../functions.php';

$grau = $_POST['grau'] ?? false;

if ($grau === false) {
    redirect('index.php?e=Erro desconhecido');
}

// $_data = file(PAR_FILENAME);
// array_map(function($el) {
//     return trim($el);
// }, $_data);
// if (in_array($grau, $_data)) {
//     redirect('index.php?e=Já existe um dado idêntico cadastrado');
// }

$data = $grau . EOL;

$handle = fopen(PAR_FILENAME, 'a');
fwrite($handle, $data);
fclose($handle);

redirect('index.php?m=Dado adicionado');
?>