<?php
# ...
$mercury = fopen('teste.txt', 'r');
// echo filesize('/Users/ranieri/Desktop/table1.png');
$conteudo = fread($mercury, filesize('teste.txt')); // todo conteúdo do arquivo
echo "<pre>$conteudo</pre>";
# ...
?>