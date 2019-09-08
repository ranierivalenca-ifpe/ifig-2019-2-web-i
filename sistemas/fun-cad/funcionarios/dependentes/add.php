<?php
require '../../config.php';
require '../../functions.php';

$parentesco = $_POST['parentesco'] ?? false;
$cpf = $_POST['cpf'] ?? false;
$nome = $_POST['nome'] ?? false;
$sobrenome = $_POST['sobrenome'] ?? false;
$func_cpf = $_POST['func_cpf'] ?? false;

if ($parentesco === false ||
    $cpf === false ||
    $nome === false ||
    $sobrenome === false ||
    $func_cpf === false) {
    redirect('/');
}

$_data = get_csv_data(DEP_FILENAME);
$_cpfs = array_map(function($el) {
    return $el[0];
}, $_data);
if (in_array($cpf, $_cpfs)) {
    redirect("../func.php?cpf=$func_cpf&e=Já existe um dependente cadastrado com este CPF");
}

$data = implode(',', [$cpf, $nome, $sobrenome, $parentesco, $func_cpf]) . EOL;

$handle = fopen(DEP_FILENAME, 'a');
fwrite($handle, $data);
fclose($handle);

redirect("../func.php?cpf=$func_cpf&m=Dependente adicionado");
?>