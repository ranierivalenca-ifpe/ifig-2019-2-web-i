<?php
require '../config.php';
require '../functions.php';
require 'funcionarios_functions.php';

$fields = ['cpf', 'nome', 'sobrenome', 'email', 'tel1', 'tel2', 'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'];
$valid_inputs = true;
foreach ($fields as $field) {
    $$field = $_POST[$field] ?? false;
    $valid_inputs = $valid_inputs && $$field !== false;
}

if (!$valid_inputs) {
    redirect('index.php?e=Erro desconhecido');
}

if (add_funcionario($cpf, $nome, $sobrenome, $email, $tel1, $tel2, $cep, $logradouro, $numero, $bairro, $cidade, $estado) === false) {
    redirect('index.php?e=Já existe um funcionário com este CPF cadastrado');
}


redirect('index.php?m=Funcionário adicionado');
?>