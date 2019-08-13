# Funções em PHP

PHP é uma linguagem *multiparadigma*, que suporta recursos dos paradigmas imperativo, orientado a objetos e, em menor grau, funcional. E como toda linguagem imperativa, podemos escrever nossas próprias funções. A forma mais simples de fazer isso é utilizando a palavra `function`, seguida do nome da função, parênteses com os parâmetros dentro deles, e um bloco de código (bastante similar a JavaScript). A seguir, um exemplo de função em PHP:

```php
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
            $soma = $soma + $val;
        }
        return $soma;
    }
    // ...

    $arr = [1, 1, 2, 3, 5, 8, 11, 19, 30, 49, 79, 128];
    echo "a soma dos valores eh " . soma($arr);
?>
```

Neste exemplo também podemos ver a utilização de comentários, utilizando `//`. Comentários em PHP também podem ser começados por `#`. Para comentários de bloco, utilizamos `/* ... */`, similar também a JavaScript.

Além de podermos criar nossas próprias funções, o PHP tem uma quantidade *gigantesca* de funções pré-definidas, para trabalhar com [strings](https://www.php.net/manual/pt_BR/ref.strings.php), [arrays](https://www.php.net/manual/pt_BR/ref.array.php), [datas](https://www.php.net/manual/pt_BR/ref.datetime.php), arquivos (assunto da próxima aula), banco de dados, ... Vale *muito a pena* estudar tais funções, portanto leiam as documentações.

# Leitura e escrita de arquivos em PHP

Para se trabalhar com arquivos em uma linguagem de programação, é importante entender o conceito de *handler*, ou ***manipulador***. Um manipulador de arquivo é uma variável cujo valor é uma *referência* para o sistema de arquivos do computador, de forma que, com essa variável, é possível ler ou escrever naquele arquivo.

Em PHP, para trabalhar com arquivos, precisamos *abrir* o arquivo, em modo de *leitura*, *escrita* ou *leitura e escrita* (PHP tem algumas nuances, como será visto mais a frente). Após abrir um arquivo, podemos ler seu conteúdo (se estiver em modo de leitura) ou escrever nele (se estiver em modo de escrita).

## Escrita em arquivos com PHP

Veja o exemplo a seguir:
```php
<?php
# ...
$fp = open('teste.txt', 'w');
for ($i = 0; $i < 10; $i++) {
    fwrite($fp, "linha $i" . PHP_EOL);
}
fclose($fp);
# ...
?>
```

Neste exemplo, a variável `$fp` mantém um manipulador de arquivo, que aponta para o arquivo `teste.txt`, em modo de escrita (`w`). Neste modo, caso o arquivo não exista, ele é criado; caso já exista, **seu conteúdo é apagado**, e o *cursor* é colocado no começo do arquivo. Para saber mais sobre os modos de abertura de arquivos, veja a [documentação da função fopen](https://www.php.net/manual/pt_BR/function.fopen.php). O nome da variável (`fp`) é uma abreviação para *file pointer*, um termo comumente utilizado para descrever manipuladores de arquivo. Outro nome comum para manipulador de arquivo é `handler`.

Dentro do `for`, ainda no exemplo, a função `fwrite()` é utilizada para *escrever* no arquivo a string passada no segundo parâmetro. Para mais informações sobre a função, consulte sua [documentação](https://www.php.net/manual/pt_BR/function.fwrite.php). Ao final da linha, adicionamos também uma *quebra de linha* (`\n` em sistemas baseados em UNIX e `\r\n` para sistemas baseados em Windows), definida pelo PHP na constante `PHP_EOL`.

A função `fclose()` é utilizada para *fechar* o manipulador de arquivo, e assim liberar tanto espaço na memória quanto o arquivo para ser utilizado por outro programa do SO. Caso a função `fclose()` não seja chamada, a finalização do script também fecha quaisquer manipuladores que não tenham sido já fechados.

## Leitura de arquivos em PHP

Para ler um arquivo em PHP, precisamos abrir o arquivo em modo de leitura, `r`, conforme o exemplo a seguir:
```php
<?php
# ...
$handle = open('teste.txt', 'r');
$conteudo = fread($handle, filesize($handle));
echo "<pre>$conteudo</pre>";
# ...
?>
```

Neste exemplo, utilizamos também a função `filesize()`, que retorna o tamanho em *bytes* do arquivo.

## Outras funções para leitura e escrita de arquivos

Como já dito, PHP também possui outras funções para leitura e escrita de arquivos, que facilitam bastante esse processo:
- [`file_put_contents()`](https://www.php.net/manual/pt_BR/function.file-put-contents.php)
- [`file_get_contents()`](https://www.php.net/manual/pt_BR/function.file-get-contents.php)
- [`file()`](https://www.php.net/manual/pt_BR/function.file.php)

As implementações destas funções parecem-se com as seguintes:
```php
<?php
function _file_put_contents($arquivo, $conteudo) {
    $fp = open($arquivo, 'w');
    fwrite($fp, $conteudo);
    fclose($fp);
}

function _file_get_contents($arquivo) {
    $fp = open($arquivo, 'r');
    $conteudo = fread($fp, filesize($arquivo));
    fclose($fp);
    return $conteudo;
}
?>
```

A função `file()` tem um comportamento diferente, um pouco mais complexo de ser mostrado. Mas seu comportamento é *extremamente útil* para os exemplos que serão trabalhados ao longo da disciplina. Esta função lê todo o conteúdo do arquivo e coloca **cada linha do arquivo em um elemento do array**. Veja o exemplo a seguir:

```php
<?php
# ...
$linhas = file('teste.txt');
for($i = 0; $i < sizeof($linhas); $i++) {
    $linhas[$i] = trim($linhas[$i]);
}
# ...
?>
<ul>
    <?php foreach ($linhas as $linha): ?>
        <li><?= $linha ?></li>
    <?php endforeach ?>
</ul>
```

Note o uso da função `trim()`, que serve para "limpar" a string, "aparando" os espaços em branco antes e depois dela. Por exemplo, `trim("  abc \n")` resultaria na string `abc` simplesmente, sem os espaços antes nem depois (incluindo a quebra de linha). Esse processo não é *necessário* para o exemplo em questão, visto que o HTML ignora espaços em branco, mas em outros será importante.

## Referências de mais conteúdos

- https://www.php.net/manual/pt_BR/language.functions.php