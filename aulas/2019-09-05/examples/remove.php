<?php
$linhas = file('arquivo.txt');

$linhaParaApagar = 2;

unset($linhas[$linhaParaApagar]);

file_put_contents('arquivo.txt', implode('', $linhas));
?>