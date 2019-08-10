# Sintaxe básica do PHP

Antes de falar sobre a sintaxe básica do PHP, vale salientar alguns detalhes sobre como o PHP funciona no modelo cliente-servidor.

Como sabe-se, o PHP possui um [servidor embutido](https://www.php.net/manual/pt_BR/features.commandline.webserver.php), que utiliza a pasta atual como raiz. Para utilizá-lo, basta executar o comando `php -S localhost:8000`, como já explicado anteriormente.

Este servidor tem como comportamento padrão servir os arquivos requisitados da forma como estão no disco. Isto funciona para a maioria dos arquivos, com algumas exceções. Uma dessas exceções, e a mais importante delas é para os que possuem a extensão `.php`. Para estes arquivos, o servidor embutido de PHP (assim como servidores PHP em geral), antes de enviá-lo, esses arquivos são **interpretados**. De forma simplória, é como se, internamente, o servidor estivesse executando o comando `php arquivo-requisitado.php`, e enviando no response *apenas o que é escrito por esta execução*.

## Hello World e variáveis

Antes do primeiro exemplo, vale salientar um detalhe extremamente importante. O PHP interpreta **apenas** o código que estiver entre os delimitadores de código PHP, `<?php` e `?>`. Tudo que estiver fora destes delimitadores será escrito da forma como está.

Agora, veja o exemplo a seguir:
```html
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

Primeiro, **o nome de qualquer variável inicia com o símbolo `$`**. Após o `$`, segue-se a regra normal de linguagens *C-like* (primeiro caractere precisa ser uma letra ou `_` e os caracteres seguintes podem ser letras, números ou `_`). Outra diferença importante é o **operador de concatenação de PHP ser o caractere `.`**.

Além disso, em importante salientar que em PHP strings podem ser descritas entre aspas simples (`''`) ou aspas duplas (`""`) (há ainda outros detalhes sobre strings, que podem ser vistos [aqui](https://www.php.net/manual/pt_BR/language.types.string.php)). A diferença basicamente consiste no fato de que strings delimitadas por aspas duplas *tentam interpretar variáveis que estejam dentro delas*, enquanto strings delimitadas por aspas simples não. Então, o exemplo a seguir tem o mesmo resultado que o anterior:
```php
<?php
    $nome = 'ranieri';
    echo "o professor é $nome";
?>
```

## Estruturas de controle

Como já falado, as estruturas de controle em PHP são similares a outras linguagens:
```php
<ul>
<?php
    for ($i = 0; $i < 10; $i++) {
        if ($i == 5) {
            echo "<li><strong>$i</strong></li>";
        } else {
            echo '<li>' . $i . '</li>';
        }
    }
?>
</ul>
```

Mas esta sintaxe traz um problema ao PHP quando integrado ao HTML (função para o qual foi desenvolvido): o código HTML fica misturado ao PHP, dentro de strings, diminuindo drasticamente a *manutenibilidade* do código. Assim, para resolver este problema, o PHP traz uma sintaxe alternativa, que permite que blocos de código HTML sejam separados de blocos de código PHP. No exemplo a seguir, o HTML resultante será **o mesmo do exemplo anterior**, exceto por alguns espaços extras:
```php
<ul>
    <?php for ($i = 0; i < 10; $i++): ?>
        <?php if ($i == 5): ?>
            <li><strong><?= $i ?></strong></li>
        <?php else: ?>
            <li><?= $i ?></li>
        <?php endif ?>
    <?php endif ?>
</ul>
```

Note neste exemplo também o uso da sintaxe `<?= $i ?>`. Esta é uma outra sintaxe abreviada dos delimitadores de PHP, que é a mesma coisa que `<?php echo $i; ?>`, para facilitar a escrita de variáveis dentro de códigos HTML.