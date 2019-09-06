<?php
include 'constantes.php';

$linhas = file(FILENAME);

$id = $_GET['id'];

unset($linhas[$id]);

file_put_contents(FILENAME, implode('', $linhas));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.html' ?>
</head>
<body>
    <h1>Funcionário removido</h1>
    <div class="actions">
        <a href="table.php">Voltar para a tabela</a>
    </div>
</body>
</html>