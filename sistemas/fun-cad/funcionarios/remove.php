<?php
require '../functions.php';
require 'funcionarios_functions.php';

$cpf = $_GET['cpf'] ?? false;

if ($cpf === false) {
    redirect('index.php?e=Erro desconhecido');
}
if (remove_funcionario($cpf) === false) {
    redirect('index.php?e=Funcionário não encontrado');
}

redirect('index.php?m=Funcionário removido');
?>