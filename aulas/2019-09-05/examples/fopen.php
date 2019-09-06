<?php
// ...
// $fp = fopen('arquivo.txt', 'w'); // se o arquivo já existir, seu conteúdo será apagado
// fwrite($fp, "um texto qualquer\n"); // escreve 'um texto qualquer' dentro do arquivo; note o uso de aspas duplas delimitar a string - em PHP, strings com aspas simples NÃO INTERPRETAM CARACTERES ESCAPADOS
// fclose($fp);

// ...

$fp = fopen('arquivo.txt', 'a'); // se o arquivo já existir, abre e coloca o cursor no final do arquivo, mantendo o seu conteúdo
fwrite($fp, "outro texto qualquer\n");
fclose($fp);
// ...
?>