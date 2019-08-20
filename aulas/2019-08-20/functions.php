<?php
// ...
function status($nota) {
    if ($nota >= 6) {
        return 'aprovado';
    } else if ($nota >= 2) {
        return 'final';
    }
    return 'reprovado';
}

function soma($values) {
    $soma = 0;
    foreach($values as $val) {
        // $soma = $soma + $val;
        $soma += $val;
        # a += 1 // a = a + 1
        # a -= 1 // a = a - 1
        # a *= 2 // a = a * 2
        # a /= 2 // a = a / 2
        # a++ // a += 1
        # a-- // a -= 1
    }
    return $soma;
}
// ...

$arr = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144];
echo "a soma dos valores eh " . soma($arr);

// $situacao é do tipo "callable"
$situacao = function($nota) {
    if ($nota < 2) {
        return 'reprovado';
    }
    if ($nota < 6) {
        return 'recuperação';
    }
    return 'aprovado';
};

function exec($function) {
    echo "executando uma função...";
    $function();
}

echo $situacao(8);

$numeros = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144];

$quadrados = array_map(function($num) {
    return $num * $num;
}, $numeros);


?>