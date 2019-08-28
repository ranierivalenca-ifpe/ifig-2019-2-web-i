

<?php
function media($_notas) {
    $soma = array_sum($_notas);
    $quant = sizeof($_notas);
    return $soma / $quant;
}

$notas = [9, 6, 4, 8];
echo media($notas) . PHP_EOL; // constante que representa o caractere "\n" em sistemas Unix e "\r\n" em sistemas Windows

echo $soma; # isso gerará um warning - a variávei $soma não está disponível neste contexto
?>