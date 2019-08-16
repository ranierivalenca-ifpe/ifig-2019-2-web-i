# Tipos de dados em PHP

PHP possui oito tipos de dados primitivos:
- [boolean](https://www.php.net/manual/pt_BR/language.types.boolean.php) - valor booleano [true  false]
- [integer](https://www.php.net/manual/pt_BR/language.types.integer.php) - valores inteiros (incluindo dados *long*)
- [float](https://www.php.net/manual/pt_BR/language.types.float.php) - valores de ponto flutuante (incluindo dados *double*)
- [string](https://www.php.net/manual/pt_BR/language.types.string.php) - sequências de caracteres
- [array](https://www.php.net/manual/pt_BR/language.types.array.php) - um agrupamento de dados, de qualquer tipo
- [object](https://www.php.net/manual/pt_BR/language.types.object.php) - objetos
- [callable](https://www.php.net/manual/pt_BR/language.types.callable.php) - funções
- [resource](https://www.php.net/manual/pt_BR/language.types.resource.php) - recursos externos
- [null](https://www.php.net/manual/pt_BR/language.types.null.php) - tipo nulo

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

    $arr = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144];
    echo "a soma dos valores eh " . soma($arr);
?>
```

Neste exemplo também podemos ver a utilização de comentários, utilizando `//`. Comentários em PHP também podem ser começados por `#`. Para comentários de bloco, utilizamos `/* ... */`, similar também a JavaScript.

Além de podermos criar nossas próprias funções, o PHP tem uma quantidade *gigantesca* de funções pré-definidas, para trabalhar com **[strings]**(https://www.php.net/manual/pt_BR/ref.strings.php), **[arrays]**(https://www.php.net/manual/pt_BR/ref.array.php), **[datas]**(https://www.php.net/manual/pt_BR/ref.datetime.php), **[sistema de arquivos]**(https://www.php.net/manual/pt_BR/ref.filesystem.php), **[variáveis]**(https://www.php.net/manual/pt_BR/book.var.php), banco de dados, ... Vale *muito a pena* estudar tais funções, portanto leiam as documentações.

## Funções anônimas

Em PHP também é possível criar **funções anônimas**. Essas funções não possuem nome, e podem ser armazenadas em variáveis ou mesmo em arrays. A seguir, um exemplo de funções anônimas:

```php
<?php
$situacao = function($nota) {
    if ($nota < 2) {
        return 'reprovado';
    }
    if ($nota < 6) {
        return 'recuperação';
    }
    return 'aprovado';
};

echo $situacao(8);
?>
```

Este tipo de função tem um uso bastante importante que é *dentro de outras funções*. Por exemplo, quando se utiliza a função `array_map()`, utilizada para aplicar uma função aos elementos de um array, é muito comum que esta função seja uma função anônima, como mostra o exemplo abaixo:
```php
<?php
$numeros = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144];

$quadrados = array_map(function($num) {
    return $num * $num;
}, $numeros);
?>
```

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

# Funções importantes

Como já dito anteriormente, PHP possui uma série de funções prontas, que são extremamente úteis em diversos contextos. Abaixo uma pequena lista de funções importantes de serem entendidas. Algumas delas serão essenciais nesta disciplina, outras na vida profissional:

#### Funções de arquivos
- [copy](https://www.google.com/search?q=php+copy) — Copia arquivo
- [dirname](https://www.google.com/search?q=php+dirname) — Retorna o caminho/path do diretório pai
- [fclose](https://www.google.com/search?q=php+fclose) — Fecha um ponteiro de arquivo aberto
- [file_exists](https://www.google.com/search?q=php+file_exists) — Verifica se um arquivo ou diretório existe
- [file_get_contents](https://www.google.com/search?q=php+file_get_contents) — Lê todo o conteúdo de um arquivo para uma string
- [file_put_contents](https://www.google.com/search?q=php+file_put_contents) — Escreve uma string para um arquivo
- [file](https://www.google.com/search?q=php+file) — Lê todo o arquivo para um array
- [fileatime](https://www.google.com/search?q=php+fileatime) — Obtém o último horário de acesso do arquivo
- [filectime](https://www.google.com/search?q=php+filectime) — Obtém o tempo de modificação do inode do arquivo
- [filemtime](https://www.google.com/search?q=php+filemtime) — Obtém o tempo de modificação do arquivo
- [filesize](https://www.google.com/search?q=php+filesize) — Obtém o tamanho do arquivo
- [filetype](https://www.google.com/search?q=php+filetype) — Lê o tipo do arquivo
- [fopen](https://www.google.com/search?q=php+fopen) — Abre um arquivo ou URL
- [fputcsv](https://www.google.com/search?q=php+fputcsv) — Formata a linha como CSV e a escreve em um ponteiro de arquivo
- [fread](https://www.google.com/search?q=php+fread) — Leitura binary-safe de arquivo
- [fwrite](https://www.google.com/search?q=php+fwrite) — Escrita binary-safe em arquivos
- [is_dir](https://www.google.com/search?q=php+is_dir) — Diz se o caminho é um diretório
- [is_file](https://www.google.com/search?q=php+is_file) — Informa se o arquivo é um arquivo comum
- [is_uploaded_file](https://www.google.com/search?q=php+is_uploaded_file) — Diz se o arquivo foi enviado por POST HTTP
- [mkdir](https://www.google.com/search?q=php+mkdir) — Cria um diretório
- [move_uploaded_file](https://www.google.com/search?q=php+move_uploaded_file) — Move um arquivo enviado para uma nova localização
- [pathinfo](https://www.google.com/search?q=php+pathinfo) — Retorna informações sobre um caminho de arquivo
- [rename](https://www.google.com/search?q=php+rename) — Renomeia um arquivo ou diretório
- [rmdir](https://www.google.com/search?q=php+rmdir) — Remove um diretório
- [stat](https://www.google.com/search?q=php+stat) — Obtem informações sobre um arquivo
- [tempnam](https://www.google.com/search?q=php+tempnam) — Cria um nome de arquivo único
- [tmpfile](https://www.google.com/search?q=php+tmpfile) — Cria um arquivo temporário
- [touch](https://www.google.com/search?q=php+touch) — Muda o tempo de modificação do arquivo
- [unlink](https://www.google.com/search?q=php+unlink) — Apaga um arquivo

#### Funções de Arrays
- [array_chunk](https://www.google.com/search?q=php+array_chunk) — Divide um array em pedaços
- [array_column](https://www.google.com/search?q=php+array_column) — Retorna os valores de uma coluna do array informado
- [array_combine](https://www.google.com/search?q=php+array_combine) — Cria um array usando um array para chaves e outro para valores
- [array_count_values](https://www.google.com/search?q=php+array_count_values) — Conta todos os valores de um array
- [array_diff](https://www.google.com/search?q=php+array_diff) — Computa as diferenças entre arrays
- [array_fill](https://www.google.com/search?q=php+array_fill) — Preenche um array com valores
- [array_filter](https://www.google.com/search?q=php+array_filter) — Filtra elementos de um array utilizando uma função callback
- [array_flip](https://www.google.com/search?q=php+array_flip) — Permuta todas as chaves e seus valores associados em um array
- [array_intersect](https://www.google.com/search?q=php+array_intersect) — Calcula a interseção entre arrays
- [array_key_exists](https://www.google.com/search?q=php+array_key_exists) — Checa se uma chave ou índice existe em um array
- [array_keys](https://www.google.com/search?q=php+array_keys) — Retorna todas as chaves ou uma parte das chaves de um array
- [array_map](https://www.google.com/search?q=php+array_map) — Aplica uma função em todos os elementos dos arrays dados
- [array_merge](https://www.google.com/search?q=php+array_merge) — Combina um ou mais arrays
- [array_pop](https://www.google.com/search?q=php+array_pop) — Extrai um elemento do final do array
- [array_push](https://www.google.com/search?q=php+array_push) — Adiciona um ou mais elementos no final de um array
- [array_rand](https://www.google.com/search?q=php+array_rand) — Escolhe um ou mais elementos aleatórios de um array
- [array_reduce](https://www.google.com/search?q=php+array_reduce) — Reduz um array para um único valor através de um processo iterativo via função callback
- [array_reverse](https://www.google.com/search?q=php+array_reverse) — Retorna um array com os elementos na ordem inversa
- [array_search](https://www.google.com/search?q=php+array_search) — Procura por um valor em um array e retorna sua chave correspondente caso seja encontrado
- [array_shift](https://www.google.com/search?q=php+array_shift) — Retira o primeiro elemento de um array
- [array_slice](https://www.google.com/search?q=php+array_slice) — Extrai uma parcela de um array
- [array_splice](https://www.google.com/search?q=php+array_splice) — Remove uma parcela do array e substitui com outros elementos
- [array_sum](https://www.google.com/search?q=php+array_sum) — Calcula a soma dos elementos de um array
- [array_unique](https://www.google.com/search?q=php+array_unique) — Remove os valores duplicados de um array
- [array_unshift](https://www.google.com/search?q=php+array_unshift) — Adiciona um ou mais elementos no início de um array
- [array_values](https://www.google.com/search?q=php+array_values) — Retorna todos os valores de um array
- [array_walk](https://www.google.com/search?q=php+array_walk) — Aplica uma determinada funcão em cada elemento de um array
- [array](https://www.google.com/search?q=php+array) — Cria um array
- [arsort](https://www.google.com/search?q=php+arsort) — Ordena um array em ordem descrescente mantendo a associação entre índices e valores
- [asort](https://www.google.com/search?q=php+asort) — Ordena um array mantendo a associação entre índices e valores
- [compact](https://www.google.com/search?q=php+compact) — Cria um array contendo variáveis e seus valores
- [count](https://www.google.com/search?q=php+count) — Conta o número de elementos de uma variável, ou propriedades de um objeto
- [extract](https://www.google.com/search?q=php+extract) — Importa variáveis para a tabela de símbolos a partir de um array
- [in_array](https://www.google.com/search?q=php+in_array) — Checa se um valor existe em um array
- [key_exists](https://www.google.com/search?q=php+key_exists) — Sinônimo de array_key_exists
- [krsort](https://www.google.com/search?q=php+krsort) — Ordena um array pelas chaves em ordem descrescente
- [ksort](https://www.google.com/search?q=php+ksort) — Ordena um array pelas chaves
- [list](https://www.google.com/search?q=php+list) — Cria variáveis como se fossem arrays
- [natcasesort](https://www.google.com/search?q=php+natcasesort) — Ordena um array utilizando o algoritmo da "ordem natural" sem diferenciar maiúsculas e minúsculas
- [natsort](https://www.google.com/search?q=php+natsort) — Ordena um array utilizando o algoritmo da "ordem natural"
- [range](https://www.google.com/search?q=php+range) — Cria um array contendo uma faixa de elementos
- [rsort](https://www.google.com/search?q=php+rsort) — Ordena um array em ordem descrescente
- [shuffle](https://www.google.com/search?q=php+shuffle) — Mistura os elementos de um array
- [sizeof](https://www.google.com/search?q=php+sizeof) — Sinônimo de count
- [sort](https://www.google.com/search?q=php+sort) — Ordena um array
- [uasort](https://www.google.com/search?q=php+uasort) — Ordena um array utilizando uma função de comparação definida pelo usuário e mantendo as associações entre chaves e valores
- [uksort](https://www.google.com/search?q=php+uksort) — Ordena um array pelas chaves utilizando uma função de comparação definida pelo usuário.
- [usort](https://www.google.com/search?q=php+usort) — Ordena um array pelos valores utilizando uma função de comparação definida pelo usuário

#### Funções de Strings
- [addcslashes](https://www.google.com/search?q=php+addcslashes) — String entre aspas com barras no estilo C
- [addslashes](https://www.google.com/search?q=php+addslashes) — Adiciona barras invertidas a uma string
- [bin2hex](https://www.google.com/search?q=php+bin2hex) — Converte um dado binário em representação hexadecimal
- [chr](https://www.google.com/search?q=php+chr) — Retorna um caracter específico
- [chunk_split](https://www.google.com/search?q=php+chunk_split) — Divide uma string em pequenos pedaços
- [count_chars](https://www.google.com/search?q=php+count_chars) — Retorna informações sobre os caracteres usados numa string
- [crc32](https://www.google.com/search?q=php+crc32) — Calcula polinômio crc32 de uma string
- [crypt](https://www.google.com/search?q=php+crypt) — Encriptação unidirecional de string (hashing)
- [echo](https://www.google.com/search?q=php+echo) — Exibe uma ou mais strings
- [explode](https://www.google.com/search?q=php+explode) — Divide uma string em strings
- [html_entity_decode](https://www.google.com/search?q=php+html_entity_decode) — Converte todas as entidades HTML para os seus caracteres
- [htmlentities](https://www.google.com/search?q=php+htmlentities) — Converte todos os caracteres aplicáveis em entidades html.
- [htmlspecialchars_decode](https://www.google.com/search?q=php+htmlspecialchars_decode) — Converte especiais entidades HTML para caracteres
- [htmlspecialchars](https://www.google.com/search?q=php+htmlspecialchars) — Converte caracteres especiais para a realidade HTML
- [implode](https://www.google.com/search?q=php+implode) — Junta elementos de uma matriz em uma string
- [lcfirst](https://www.google.com/search?q=php+lcfirst) — Torna minúsculo o primeiro caractere de uma string
- [localeconv](https://www.google.com/search?q=php+localeconv) — Obtém a informação da formatação numérica
- [ltrim](https://www.google.com/search?q=php+ltrim) — Retira espaços em branco (ou outros caracteres) do início da string
- [md5_file](https://www.google.com/search?q=php+md5_file) — Calcula hash md5 de um dado arquivo
- [md5](https://www.google.com/search?q=php+md5) — Calcula o "hash MD5" de uma string
- [money_format](https://www.google.com/search?q=php+money_format) — Formata um número como uma string de moeda
- [nl_langinfo](https://www.google.com/search?q=php+nl_langinfo) — Retorna informação de linguagem e local
- [nl2br](https://www.google.com/search?q=php+nl2br) — Insere quebras de linha HTML antes de todas newlines em uma string
- [number_format](https://www.google.com/search?q=php+number_format) — Formata um número com os milhares agrupados
- [ord](https://www.google.com/search?q=php+ord) — Retorna o valor ASCII do caractere
- [print](https://www.google.com/search?q=php+print) — Mostra uma string
- [printf](https://www.google.com/search?q=php+printf) — Mostra uma string formatada
- [rtrim](https://www.google.com/search?q=php+rtrim) — Retira espaço em branco (ou outros caracteres) do final da string
- [setlocale](https://www.google.com/search?q=php+setlocale) — Define informações locais
- [sha1_file](https://www.google.com/search?q=php+sha1_file) — Calcula a hash sha1 de um arquivo
- [sha1](https://www.google.com/search?q=php+sha1) — Calcula a hash sha1 de uma string
- [similar_text](https://www.google.com/search?q=php+similar_text) — Calcula a similaridade entre duas strings
- [sprintf](https://www.google.com/search?q=php+sprintf) — Retorna a string formatada
- [str_getcsv](https://www.google.com/search?q=php+str_getcsv) — Analisa uma string CSV e retorna os dados em um array
- [str_ireplace](https://www.google.com/search?q=php+str_ireplace) — Versão que não diferencia maiúsculas e minúsculas de str_replace.
- [str_pad](https://www.google.com/search?q=php+str_pad) — Preenche uma string para um certo tamanho com outra string
- [str_repeat](https://www.google.com/search?q=php+str_repeat) — Repete uma string
- [str_replace](https://www.google.com/search?q=php+str_replace) — Substitui todas as ocorrências da string de procura com a string de substituição
- [str_shuffle](https://www.google.com/search?q=php+str_shuffle) — Mistura uma string aleatoriamente
- [str_split](https://www.google.com/search?q=php+str_split) — Converte uma string para um array
- [str_word_count](https://www.google.com/search?q=php+str_word_count) — Retorna informação sobre as palavras usadas em uma string
- [strcasecmp](https://www.google.com/search?q=php+strcasecmp) — Comparação de strings sem diferenciar maiúsculas e minúsculas segura para binário
- [strcmp](https://www.google.com/search?q=php+strcmp) — Comparação de string segura para binário
- [strip_tags](https://www.google.com/search?q=php+strip_tags) — Retira as tags HTML e PHP de uma string
- [stripcslashes](https://www.google.com/search?q=php+stripcslashes) — Desfaz o efeito de addcslashes
- [stripos](https://www.google.com/search?q=php+stripos) — Encontra a primeira ocorrencia de uma string sem diferenciar maiúsculas e minúsculas
- [stripslashes](https://www.google.com/search?q=php+stripslashes) — Desfaz o efeito de addslashes
- [stristr](https://www.google.com/search?q=php+stristr) — strstr sem diferenciar maiúsculas e minúsculas
- [strlen](https://www.google.com/search?q=php+strlen) — Retorna o tamanho de uma string
- [strnatcasecmp](https://www.google.com/search?q=php+strnatcasecmp) — Comparação de strings sem diferenciar maiúsculas/minúsculas usando o algoritmo "natural order"
- [strnatcmp](https://www.google.com/search?q=php+strnatcmp) — Comparação de strings usando o algoritmo "natural order"
- [strncasecmp](https://www.google.com/search?q=php+strncasecmp) — Comparação de string caso-sensitivo de Binário seguro dos primeiros n caracteres
- [strncmp](https://www.google.com/search?q=php+strncmp) — Comparação de string segura para binário para os primeiros n caracteres
- [strrev](https://www.google.com/search?q=php+strrev) — Reverte uma string
- [strstr](https://www.google.com/search?q=php+strstr) — Encontra a primeira ocorrencia de uma string
- [strtolower](https://www.google.com/search?q=php+strtolower) — Converte uma string para minúsculas
- [strtoupper](https://www.google.com/search?q=php+strtoupper) — Converte uma string para maiúsculas
- [substr_compare](https://www.google.com/search?q=php+substr_compare) — A comparação binária entre duas strings de um offset até o limite do comprimento de caracteres
- [substr_count](https://www.google.com/search?q=php+substr_count) — Conta o número de ocorrências de uma substring
- [substr_replace](https://www.google.com/search?q=php+substr_replace) — Substitui o texto dentro de uma parte de uma string
- [substr](https://www.google.com/search?q=php+substr) — Retorna uma parte de uma string
- [trim](https://www.google.com/search?q=php+trim) — Retira espaço no ínicio e final de uma string
- [ucfirst](https://www.google.com/search?q=php+ucfirst) — Converte para maiúscula o primeiro caractere de uma string
- [ucwords](https://www.google.com/search?q=php+ucwords) — Converte para maiúsculas o primeiro caractere de cada palavra
- [wordwrap](https://www.google.com/search?q=php+wordwrap) — Quebra uma string em um dado número de caracteres

#### Funções de manipulação de variáveis
- [boolval](https://www.google.com/search?q=php+boolval) — Obtém o valor booleano de uma variável
- [empty](https://www.google.com/search?q=php+empty) — Determina se a variável é vazia
- [floatval](https://www.google.com/search?q=php+floatval) — Obtém o valor em ponto flutuante da variável
- [get_defined_vars](https://www.google.com/search?q=php+get_defined_vars) — Retorna um array com todas variáveis definidas
- [get_resource_type](https://www.google.com/search?q=php+get_resource_type) — Retorna o tipo de resource
- [gettype](https://www.google.com/search?q=php+gettype) — Obtém o tipo da variável
- [intval](https://www.google.com/search?q=php+intval) — Retorna o valor inteiro da variável
- [is_array](https://www.google.com/search?q=php+is_array) — Verifica se a variável é um array
- [is_bool](https://www.google.com/search?q=php+is_bool) — Verifica se a variável é um boleano
- [is_callable](https://www.google.com/search?q=php+is_callable) — Verifica se o conteúdo da variável pode ser chamado como função
- [is_float](https://www.google.com/search?q=php+is_float) — Informa se a variável é do tipo float
- [is_int](https://www.google.com/search?q=php+is_int) — Informa se a variável é do tipo inteiro
- [is_null](https://www.google.com/search?q=php+is_null) — Informa se a variável é NULL
- [is_numeric](https://www.google.com/search?q=php+is_numeric) — Informa se a variável é um número ou uma string numérica
- [is_object](https://www.google.com/search?q=php+is_object) — Informa se a variável é um objeto
- [is_resource](https://www.google.com/search?q=php+is_resource) — Informa se a variável é um resource
- [is_string](https://www.google.com/search?q=php+is_string) — Informa se a variável é do tipo string
- [isset](https://www.google.com/search?q=php+isset) — Informa se a variável foi iniciada
- [print_r](https://www.google.com/search?q=php+print_r) — Imprime informação sobre uma variável de forma legível
- [serialize](https://www.google.com/search?q=php+serialize) — Generates a storable representation of a value
- [strval](https://www.google.com/search?q=php+strval) — Retorna o valor string de uma variável
- [unserialize](https://www.google.com/search?q=php+unserialize) — Creates a PHP value from a stored representation
- [unset](https://www.google.com/search?q=php+unset) — Destrói a variável especificada
- [var_dump](https://www.google.com/search?q=php+var_dump) — Mostra informações sobre a variável
- [var_export](https://www.google.com/search?q=php+var_export) — Mostra ou retorna uma representação estruturada de uma variável

#### Função para trabalhar com datas
- [date](https://www.google.com/search?q=php+date)

A seguir algumas referências externas (além das que já foram citadas no texto) que contém *bem mais informação* sobre o que foi explicado aqui:
- https://www.php.net/manual/pt_BR/language.functions.php
- https://desenvolvimentoparaweb.com/php/funcoes-anonimas-closures-php/
- https://www.php.net/manual/pt_BR/ref.filesystem.php