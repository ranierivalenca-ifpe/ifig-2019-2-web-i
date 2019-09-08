<?php
require_once '../config.php';

$__funcionarios_cache = null;

function get_funcionario($cpf) {
    $funcs = get_funcionarios();
    return $funcs[$cpf] ?? false;
}

function get_funcionarios() {
    global $__funcionarios_cache;

    if (!is_null($__funcionarios_cache)) {
        return $__funcionarios_cache;
    }

    if (!is_file(FNC_FILENAME)) {
        return [];
    }
    $rows = file(FNC_FILENAME);
    $_data = array_map('str_getcsv', $rows);
    $data = [];
    foreach($_data as $row => $func) {
        list($cpf, $nome, $sobrenome, $email, $tel1, $tel2, $cep, $logradouro, $numero, $bairro, $cidade, $estado) = $func;
        $data[$cpf] = [
            'cpf' => $cpf,
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'email' => $email,
            'tel1' => $tel1,
            'tel2' => $tel2,
            'cep' => $cep,
            'logradouro' => $logradouro,
            'numero' => $numero,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'estado' => $estado,

            'row' => $row
        ];
    }
    $__funcionarios_cache = $data;
    return $data;
}

function add_funcionario($cpf, $nome, $sobrenome, $email, $tel1, $tel2, $cep, $logradouro, $numero, $bairro, $cidade, $estado) {
    if (get_funcionario($cpf) !== false) {
        return false;
    }

    $data = implode(',', [$cpf, $nome, $sobrenome, $email, $tel1, $tel2, $cep, $logradouro, $numero, $bairro, $cidade, $estado]) . EOL;

    $handle = fopen(FNC_FILENAME, 'a');
    fwrite($handle, $data);
    fclose($handle);

    return true;
}

function remove_funcionario($cpf) {
    if (get_funcionario($cpf) === false) {
        return false;
    }
    $funcionarios = get_funcionarios();

    $data = file(FNC_FILENAME);
    unset($data[$funcionarios[$cpf]['row']]);
    file_put_contents(FNC_FILENAME, implode('', $data));
    return true;
}
?>