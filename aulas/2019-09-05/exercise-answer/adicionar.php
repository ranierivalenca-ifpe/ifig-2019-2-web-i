<?php
include 'constantes.php';

$nome = $_POST['name'];
$idade = $_POST['age'];
$pais = $_POST['country'];

$dados = implode(',', [$nome, $idade, $pais]) . "\n";

$handle = fopen(FILENAME, 'a');
fwrite($handle, $dados);
fclose($handle);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.html' ?>
</head>
<body>
    <h1>Funcionário adicionado</h1>
    <div class="actions">
        <a href="table.php">Voltar para a tabela</a>
    </div>
</body>
</html>