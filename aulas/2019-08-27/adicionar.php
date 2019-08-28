
<?php
$nome = $_POST['name'];
$sobrenome = $_POST['surname'];
?>
<h2>Dados recebidos:</h2>
<ul>
    <li>Nome: <strong><?= $nome ?></strong></li>
    <li>Sobrenome: <strong><?= $_POST['surname'] ?></strong></li>
</ul>