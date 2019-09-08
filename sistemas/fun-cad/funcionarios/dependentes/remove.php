<?php
include '../../config.php';
include '../../functions.php';

$cpf = $_GET['cpf'] ?? false;
$func_cpf = $_GET['func'] ?? false;

if ($cpf === false) {
    redirect('../func.php?e=Erro desconhecido');
}

$_data = get_csv_data(DEP_FILENAME);
$_cpfs = array_map(function($el) {
    return $el[0];
}, $_data);
$row = array_search($cpf, $_cpfs);
if ($row === false) {
    redirect('../func.php?e=Dependente não encontrado');
}

$data = file(DEP_FILENAME);
unset($data[$row]);

file_put_contents(DEP_FILENAME, implode('', $data));

redirect("../func.php?cpf=$func_cpf&m=Dependente removido");
?>