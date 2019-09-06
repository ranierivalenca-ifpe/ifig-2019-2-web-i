# Técnicas para manipulação de arquivos

Como já mostrado anteriormente, para manipular arquivos em PHP (e em basicamente qualquer outra linguagem de programação) é preciso de um *manipulador* de arquivo. Em PHP, esse manipulador é uma variável do tipo *resource*, retornada por uma chamada à função `fopen()`.

A seguir, serão descritas algumas técnicas que podem ser utilizadas para trabalhar com arquivos em PHP.

### Lendo o arquivo inteiro

As formas mais simples de se ler o conteúdo de um arquivo são através das funções `file_get_contents()`, que retornará *todo o conteúdo do arquivo como uma **string***, e através da função `file()`, que colocará cada linha do arquivo em um elemento de um array (incluindo o caractere `\n` (e possivelmente o `\r`)).

Outra forma de ler o conteúdo de um arquivo, linha a linha, é através da função `fgets()`, para a qual deve ser passado um manipulador de arquivo (aberto no modo `r` através da função `fopen()`). Esta função irá ler uma linha do arquivo (incluindo o caractere de quebra de linha), e irá mover o *ponteiro* do manipulador para o início da próxima linha (o conceito de ponteiro neste contexto será explicado adiante). Quando o ponteiro está no final do arquivo, a função retornará o valor booleano `false`. Observe o exemplo a seguir:

```php
<?php
$fp = fopen('arquivo.txt', 'r');
$linha = fgets($fp); // lê a primeira linha do arquivo
while($linha !== false) {
    echo $linha . '<br>';
    $linha = fgets($fp); // lê a próxima linha do arquivo
}

// Poderia ser escrito também desta forma abaixo. Se não entender, procure o professor =)
/* while(($linha = fgets($fp)) !== false) {
    echo $linha;
} */
?>
```

Note neste exemplo o operador `!==`. Este é um operador de **não identidade**, já que PHP diferencia *igualdade* (valores são iguais) de *identidade* (valores E tipos são iguais). Assim, o operador de identidade é `===`. Para mais informações, consulte a [documentação do PHP sobre comparações](https://www.php.net/manual/pt_BR/language.operators.comparison.php), já referenciada em uma aula anterior, ou [esta referência mais rápida sobre operadores em PHP](https://www.w3schools.com/php/php_operators.asp).

### Escrevendo uma linha no final de um arquivo

Para escrever apenas uma linha num arquivo qualquer, é preciso abri-lo com a função [`fopen()`](https://www.php.net/manual/pt_BR/function.fopen.php) utilizando o modo `a`. Note que este modo é diferente do modo `w` ("*write*"); enquanto este abre o arquivo e **zera seu conteúdo** (ou seja, apaga todo o seu conteúdo), o modo `a` vai abrir o arquivo **mantendo o seu conteúdo** e colocando o **ponteiro** no final do arquivo.

O conceito de *ponteiro* neste contexto é bastante similar ao cursor em um editor de texto - o cursor indica em qual ponto do arquivo será inserido aquilo que é digitado. Porém, quando se trata de manipulação de arquivos em um programa, o cursor pode ser utilizado tanto para leitura quanto para escrita, e tudo que é escrito *sobrescreve* o que estava anteriormente (exceto quando o ponteiro está no final do arquivo - nesse caso, o que for escrito será *adicionado* ao arquivo). Observe o exemplo a seguir:

```php
<?php
// ...
$fp = fopen('arquivo.txt', 'w'); // se o arquivo já existir, seu conteúdo será apagado
fwrite($fp, "um texto qualquer\n"); // escreve 'um texto qualquer' dentro do arquivo; note o uso de aspas duplas delimitar a string - em PHP, strings com aspas simples NÃO INTERPRETAM CARACTERES ESCAPADOS
fclose($fp);

// ...

$fp = fopen('arquivo.txt', 'a'); // se o arquivo já existir, abre e coloca o cursor no final do arquivo, mantendo o seu conteúdo
fwrite($fp, "outro texto qualquer\n");
fclose($fp);
// ...
?>
```

### Escrevendo uma linha no meio de um arquivo (sem sobrescrever o conteúdo)

Escrever uma linha no meio de um arquivo é um processo um pouco mais complexo, que envolve a *reescrita de todo o conteúdo do arquivo*. Na verdade isso pode ser um pouco otimizado ([veja esta pergunta no Stack Overflow](https://stackoverflow.com/questions/16813457/php-what-is-the-best-way-to-write-data-to-middle-of-file-without-rewriting-file)), mais ainda assim é um processo mais trabalhoso.

Utilizado a abordagem de reescrever o conteúdo do arquivo, a forma mais simples de fazer isso é utilizando o processo a seguir:
- ler o arquivo para um array;
- inserir um elemento no array na posição desejada (lembrando de colocar a quebra de linha ao final do conteúdo deste elemento);
- transformar o array para uma string através da função `implode()` (ou da forma que preferir);
- sobrescrever o arquivo com esta nova string.

Veja os exemplos a seguir:
```php
<?php
$linhas = file('arquivo.txt');
$linhas[] = "uma nova linha\n"; // inserindo no final do array, ou seja, no final do arquivo

$conteudo = implode('', $linhas); // note que a "cola" é uma string vazia, já que cada linha possui sua própria quebra de linha (lembre do comportamento da função 'file')

file_put_contents('arquivo.txt', $conteudo);
?>
```

```php
<?php
$linhas = file('arquivo.txt');

$novaLinha = "uma linha no meio do arquivo\n";

$conteudo = ''; // isso será parecido com o algoritmo de soma de elementos de um array
foreach($linhas as $indice => $linha) {
    // $conteudo = $conteudo . $linha;
    $conteudo .= $linha; // cada linha do array (linha do arquivo) é adicionada ao conteúdo...
    if ($indice == 1) { // mas após o índice 1 (segunda linha)...
        $conteudo .= $novaLinha; // a nova linha é inserida
    }
}

file_put_contents('arquivo.txt', $conteudo);
?>
```

### Apagando uma linha de um arquivo

Assim como escrever uma linha no meio de um arquivo, apagar uma parte de um arquivo também envolve a reescrita de todo o arquivo. O processo é exatamente o mesmo, exceto que para apagar uma linha é possível simplesmente remover o elemento do array antes de transformá-lo em string, através da função `unset()`. Caso queira manter uma linha em branco, basta substituir seu conteúdo por uma quebra de linha:
```php
<?php
$linhas = file('arquivo.txt');

$linhaParaApagar = 2;

$linhas[$linhaParaApagar] = "\n";

file_put_contents('arquivo.txt', implode('', $linhas));
?>
```

# Incluindo outros arquivos

É possível adicionar um arquivo *"dentro"* de um script PHP, incluindo-o através das estruturas de controle [`include`](https://www.php.net/manual/pt_BR/function.include.php), [`require`](https://www.php.net/manual/pt_BR/function.require.php), [`include_once`](https://www.php.net/manual/pt_BR/function.include_once.php) ou [`require_once`](https://www.php.net/manual/pt_BR/function.require_once.php).

Quando um arquivo é incluído em um script PHP ele é interpretado como sendo um código PHP. Ou seja, se for um texto plano ou um conteúdo HTML, ele será simplesmente lançado na saída padrão como qualquer outro texto ou código HTML que fosse escrito fora das tags delimitadoras do PHP (`<php ... ?>`).

Por outro lado, se o arquivo incluído possuir tags código em PHP (ou seja, entre as tags delimitadoras), então tal código será interpretado e considerado parte do código que está incluindo.

Veja o exemplo abaixo:

##### header.html
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
```

##### footer.html
```html
</body>
</html>
```

##### funcoes.php
```php
<?php
define('FILENAME', 'data.csv');

function get_data($id = null) {
    $data = file(FILENAME);
    $data = array_map('str_getcsv', $data);
    if (is_null($id) || !isset($data[$id])) {
        return $data;
    }
    return $data[$id];
}
?>
```

##### index.php
```php
<?php include 'header.html' ?>
<?php
require 'funcoes.php';
$data = get_data();
?>
<table>
    <?php foreach ($data as $item): ?>
        <tr><!-- ... --></tr>
    <?php endforeach ?>
</table>
<?php include 'footer.html' ?>
```

Neste exemplo, a `index.php` contém basicamente o *corpo* da página, enquanto o conteúdo do cabeçalho e do rodapé do HTML fica definido em outros arquivos.

Também neste exemplo é possível ver uma boa prática para o uso de constantes. A constante `FILENAME` está definida em um arquivo (`funcoes.php`) que deve ser incluído em todos os outros scripts que precisarem acessar este arquivo. Assim, caso seja necessário mudar o nome do arquivo onde as informações são lidas e escritas, basta mudar em um único lugar.

Geralmente em programação é uma boa prática manter códigos que podem ser alterados (nomes de arquivos, caminhos de sites, porta de uma aplicação, versão de um sistema, regra de negócio, etc) em um único lugar, e tudo que depender deste trecho de código deve importá-lo. No caso do PHP, esta importação é através de alguma das estruturas de controle anteriormente citadas.

Sobre as diferenças entre as formas de incluir um arquivo, veja abaixo:
- `include ...;` - inclui um arquivo e o interpreta; caso o arquivo não exista, gera um alerta mas ainda continua a execução do script.
- `require ...;` - o mesmo que o `include`, mas quando o arquivo não existe o PHP gera um erro e encerra a execução do script.
- `include_once ...;` - o mesmo que o `include`, exceto pelo fato de que caso o arquivo já tenha sido incluído, não inclui novamente.
- `require_once ...;` - mesmo que o `require`, exceto pelo fato de que caso o arquivo já tenha sido incluído, não inclui novamente.

Em resumo:

| Comando | Arquivo não existe | Verifica se já foi incluído |
| --- | --- | --- |
| `include` | alerta | não |
| `require` | erro | não |
| `include_once` | alerta | sim |
| `require_once` | erro | sim |

# Referências e mais conteúdos

- https://phpenthusiast.com/blog/parse-csv-with-php
- http://excript.com/php/importacao-include-require-php.html
- https://pt.stackoverflow.com/questions/15286/o-que-usar-require-include-require-once-include-once