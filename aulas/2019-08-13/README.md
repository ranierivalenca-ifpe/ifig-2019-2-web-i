# Sintaxe básica do PHP

Antes de falar sobre a sintaxe básica do PHP, vale salientar alguns detalhes sobre como o PHP funciona no modelo cliente-servidor.

Como sabe-se, o PHP possui um [servidor embutido](https://www.php.net/manual/pt_BR/features.commandline.webserver.php), que utiliza a pasta atual como raiz. Para utilizá-lo, basta executar o comando `php -S localhost:8000`, como já explicado anteriormente.

Este servidor tem como comportamento padrão servir os arquivos requisitados da forma como estão no disco. Isto funciona para a maioria dos arquivos, com algumas exceções. Uma dessas exceções, e a mais importante delas é para os que possuem a extensão `.php`. Para estes arquivos, o servidor embutido de PHP (assim como servidores PHP em geral), antes de enviá-lo, esses arquivos são **interpretados**. De forma simplória, é como se, internamente, o servidor estivesse executando o comando `php arquivo-requisitado.php`, e enviando no response *apenas o que é escrito por esta execução*.

## Hello World

Antes do primeiro exemplo, vale salientar um detalhe extremamente importante. O PHP interpreta **apenas** o código que estiver entre os delimitadores de código PHP, `<?php` e `?>`. Tudo que estiver fora destes delimitadores será escrito da forma como está.

Agora, veja o exemplo a seguir:
```html+php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello world</title>
</head>
<body>
    <?php echo "hello world"; ?>
</body>
</html>
```

Todo o código HTML neste exemplo será retornado naturalmente, exceto o código `<?php echo "hello world"; ?>`. Este código será interpretado, e seu retorno será simplesmente a string `"hello world"`. O comando `echo` do PHP serve para escrever uma string ou o conteúdo de uma variável:
```php
<?php
    $nome = 'ranieri';
    echo 'o professor é ' . $nome;
?>
```

Neste outro exemplo, pode-se ver a utilização de variáveis e o processo de concatenação de strings. Apesar de PHP, similar a JavaScript, ser uma linguagem *C-like* (ou seja, uma linguagem com sintaxe similar à sintaxe de C), e as operações matemáticas e de atribuição, assim como os blocos de código e estruturas de controle, serem similares, algumas diferenças importantes devem ser notadas.

Primeiro, **o nome de qualquer variável inicia com o símbolo <em>$</em>**. Após o `$`, segue-se a regra normal de linguagens *C-like* (primeiro caractere precisa ser uma letra ou `_` e os caracteres seguintes podem ser letras, números ou `_`). Outra diferença importante é o **operador de concatenação de PHP ser o caractere `.`**.