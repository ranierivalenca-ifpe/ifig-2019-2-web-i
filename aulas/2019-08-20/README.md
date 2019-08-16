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
- copy — Copia arquivo
- dirname — Retorna o caminho/path do diretório pai
- fclose — Fecha um ponteiro de arquivo aberto
- file_exists — Verifica se um arquivo ou diretório existe
- file_get_contents — Lê todo o conteúdo de um arquivo para uma string
- file_put_contents — Escreve uma string para um arquivo
- file — Lê todo o arquivo para um array
- fileatime — Obtém o último horário de acesso do arquivo
- filectime — Obtém o tempo de modificação do inode do arquivo
- filemtime — Obtém o tempo de modificação do arquivo
- filesize — Obtém o tamanho do arquivo
- filetype — Lê o tipo do arquivo
- fopen — Abre um arquivo ou URL
- fputcsv — Formata a linha como CSV e a escreve em um ponteiro de arquivo
- fread — Leitura binary-safe de arquivo
- fwrite — Escrita binary-safe em arquivos
- is_dir — Diz se o caminho é um diretório
- is_file — Informa se o arquivo é um arquivo comum
- is_uploaded_file — Diz se o arquivo foi enviado por POST HTTP
- mkdir — Cria um diretório
- move_uploaded_file — Move um arquivo enviado para uma nova localização
- pathinfo — Retorna informações sobre um caminho de arquivo
- rename — Renomeia um arquivo ou diretório
- rmdir — Remove um diretório
- stat — Obtem informações sobre um arquivo
- tempnam — Cria um nome de arquivo único
- tmpfile — Cria um arquivo temporário
- touch — Muda o tempo de modificação do arquivo
- unlink — Apaga um arquivo

#### Funções de Arrays
- array_chunk — Divide um array em pedaços
- array_column — Retorna os valores de uma coluna do array informado
- array_combine — Cria um array usando um array para chaves e outro para valores
- array_count_values — Conta todos os valores de um array
- array_diff — Computa as diferenças entre arrays
- array_fill — Preenche um array com valores
- array_filter — Filtra elementos de um array utilizando uma função callback
- array_flip — Permuta todas as chaves e seus valores associados em um array
- array_intersect — Calcula a interseção entre arrays
- array_key_exists — Checa se uma chave ou índice existe em um array
- array_keys — Retorna todas as chaves ou uma parte das chaves de um array
- array_map — Aplica uma função em todos os elementos dos arrays dados
- array_merge — Combina um ou mais arrays
- array_pop — Extrai um elemento do final do array
- array_push — Adiciona um ou mais elementos no final de um array
- array_rand — Escolhe um ou mais elementos aleatórios de um array
- array_reduce — Reduz um array para um único valor através de um processo iterativo via função callback
- array_reverse — Retorna um array com os elementos na ordem inversa
- array_search — Procura por um valor em um array e retorna sua chave correspondente caso seja encontrado
- array_shift — Retira o primeiro elemento de um array
- array_slice — Extrai uma parcela de um array
- array_splice — Remove uma parcela do array e substitui com outros elementos
- array_sum — Calcula a soma dos elementos de um array
- array_unique — Remove os valores duplicados de um array
- array_unshift — Adiciona um ou mais elementos no início de um array
- array_values — Retorna todos os valores de um array
- array_walk — Aplica uma determinada funcão em cada elemento de um array
- array — Cria um array
- arsort — Ordena um array em ordem descrescente mantendo a associação entre índices e valores
- asort — Ordena um array mantendo a associação entre índices e valores
- compact — Cria um array contendo variáveis e seus valores
- count — Conta o número de elementos de uma variável, ou propriedades de um objeto
- extract — Importa variáveis para a tabela de símbolos a partir de um array
- in_array — Checa se um valor existe em um array
- key_exists — Sinônimo de array_key_exists
- krsort — Ordena um array pelas chaves em ordem descrescente
- ksort — Ordena um array pelas chaves
- list — Cria variáveis como se fossem arrays
- natcasesort — Ordena um array utilizando o algoritmo da "ordem natural" sem diferenciar maiúsculas e minúsculas
- natsort — Ordena um array utilizando o algoritmo da "ordem natural"
- range — Cria um array contendo uma faixa de elementos
- rsort — Ordena um array em ordem descrescente
- shuffle — Mistura os elementos de um array
- sizeof — Sinônimo de count
- sort — Ordena um array
- uasort — Ordena um array utilizando uma função de comparação definida pelo usuário e mantendo as associações entre chaves e valores
- uksort — Ordena um array pelas chaves utilizando uma função de comparação definida pelo usuário.
- usort — Ordena um array pelos valores utilizando uma função de comparação definida pelo usuário

#### Funções de Strings
- addcslashes — String entre aspas com barras no estilo C
- addslashes — Adiciona barras invertidas a uma string
- bin2hex — Converte um dado binário em representação hexadecimal
- chr — Retorna um caracter específico
- chunk_split — Divide uma string em pequenos pedaços
- count_chars — Retorna informações sobre os caracteres usados numa string
- crc32 — Calcula polinômio crc32 de uma string
- crypt — Encriptação unidirecional de string (hashing)
- echo — Exibe uma ou mais strings
- explode — Divide uma string em strings
- html_entity_decode — Converte todas as entidades HTML para os seus caracteres
- htmlentities — Converte todos os caracteres aplicáveis em entidades html.
- htmlspecialchars_decode — Converte especiais entidades HTML para caracteres
- htmlspecialchars — Converte caracteres especiais para a realidade HTML
- implode — Junta elementos de uma matriz em uma string
- lcfirst — Torna minúsculo o primeiro caractere de uma string
- localeconv — Obtém a informação da formatação numérica
- ltrim — Retira espaços em branco (ou outros caracteres) do início da string
- md5_file — Calcula hash md5 de um dado arquivo
- md5 — Calcula o "hash MD5" de uma string
- money_format — Formata um número como uma string de moeda
- nl_langinfo — Retorna informação de linguagem e local
- nl2br — Insere quebras de linha HTML antes de todas newlines em uma string
- number_format — Formata um número com os milhares agrupados
- ord — Retorna o valor ASCII do caractere
- print — Mostra uma string
- printf — Mostra uma string formatada
- rtrim — Retira espaço em branco (ou outros caracteres) do final da string
- setlocale — Define informações locais
- sha1_file — Calcula a hash sha1 de um arquivo
- sha1 — Calcula a hash sha1 de uma string
- similar_text — Calcula a similaridade entre duas strings
- sprintf — Retorna a string formatada
- str_getcsv — Analisa uma string CSV e retorna os dados em um array
- str_ireplace — Versão que não diferencia maiúsculas e minúsculas de str_replace.
- str_pad — Preenche uma string para um certo tamanho com outra string
- str_repeat — Repete uma string
- str_replace — Substitui todas as ocorrências da string de procura com a string de substituição
- str_shuffle — Mistura uma string aleatoriamente
- str_split — Converte uma string para um array
- str_word_count — Retorna informação sobre as palavras usadas em uma string
- strcasecmp — Comparação de strings sem diferenciar maiúsculas e minúsculas segura para binário
- strcmp — Comparação de string segura para binário
- strip_tags — Retira as tags HTML e PHP de uma string
- stripcslashes — Desfaz o efeito de addcslashes
- stripos — Encontra a primeira ocorrencia de uma string sem diferenciar maiúsculas e minúsculas
- stripslashes — Desfaz o efeito de addslashes
- stristr — strstr sem diferenciar maiúsculas e minúsculas
- strlen — Retorna o tamanho de uma string
- strnatcasecmp — Comparação de strings sem diferenciar maiúsculas/minúsculas usando o algoritmo "natural order"
- strnatcmp — Comparação de strings usando o algoritmo "natural order"
- strncasecmp — Comparação de string caso-sensitivo de Binário seguro dos primeiros n caracteres
- strncmp — Comparação de string segura para binário para os primeiros n caracteres
- strrev — Reverte uma string
- strstr — Encontra a primeira ocorrencia de uma string
- strtolower — Converte uma string para minúsculas
- strtoupper — Converte uma string para maiúsculas
- substr_compare — A comparação binária entre duas strings de um offset até o limite do comprimento de caracteres
- substr_count — Conta o número de ocorrências de uma substring
- substr_replace — Substitui o texto dentro de uma parte de uma string
- substr — Retorna uma parte de uma string
- trim — Retira espaço no ínicio e final de uma string
- ucfirst — Converte para maiúscula o primeiro caractere de uma string
- ucwords — Converte para maiúsculas o primeiro caractere de cada palavra
- wordwrap — Quebra uma string em um dado número de caracteres

#### Funções de manipulação de variáveis
- boolval — Obtém o valor booleano de uma variável
- empty — Determina se a variável é vazia
- floatval — Obtém o valor em ponto flutuante da variável
- get_defined_vars — Retorna um array com todas variáveis definidas
- get_resource_type — Retorna o tipo de resource
- gettype — Obtém o tipo da variável
- intval — Retorna o valor inteiro da variável
- is_array — Verifica se a variável é um array
- is_bool — Verifica se a variável é um boleano
- is_callable — Verifica se o conteúdo da variável pode ser chamado como função
- is_float — Informa se a variável é do tipo float
- is_int — Informa se a variável é do tipo inteiro
- is_null — Informa se a variável é NULL
- is_numeric — Informa se a variável é um número ou uma string numérica
- is_object — Informa se a variável é um objeto
- is_resource — Informa se a variável é um resource
- is_string — Informa se a variável é do tipo string
- isset — Informa se a variável foi iniciada
- print_r — Imprime informação sobre uma variável de forma legível
- serialize — Generates a storable representation of a value
- strval — Retorna o valor string de uma variável
- unserialize — Creates a PHP value from a stored representation
- unset — Destrói a variável especificada
- var_dump — Mostra informações sobre a variável
- var_export — Mostra ou retorna uma representação estruturada de uma variável

# Referências e mais conteúdos

A seguir algumas referências externas (além das que já foram citadas no texto) que contém *bem mais informação* sobre o que foi explicado aqui:
- https://www.php.net/manual/pt_BR/language.functions.php
- https://desenvolvimentoparaweb.com/php/funcoes-anonimas-closures-php/
- https://www.php.net/manual/pt_BR/ref.filesystem.php