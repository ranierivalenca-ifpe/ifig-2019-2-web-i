# Funções importantes

Como já dito anteriormente, PHP possui uma série de funções prontas, que são extremamente úteis em diversos contextos. Abaixo uma pequena lista de funções importantes de serem entendidas. Algumas delas serão essenciais nesta disciplina, outras na vida profissional:

#### Funções de arquivos
- [copy](https://www.php.net/manual/pt_BR/function.copy.php) — Copia arquivo
- [dirname](https://www.php.net/manual/pt_BR/function.dirname.php) — Retorna o caminho/path do diretório pai
- [fclose](https://www.php.net/manual/pt_BR/function.fclose.php) — Fecha um ponteiro de arquivo aberto
- [fgetcsv](https://www.php.net/manual/pt_BR/function.fgetcsv.php) — Lê uma linha do ponteiro de arquivos e a interpreta como campos CSV
- [file_exists](https://www.php.net/manual/pt_BR/function.file-exists.php) — Verifica se um arquivo ou diretório existe
- [file_get_contents](https://www.php.net/manual/pt_BR/function.file-get-contents.php) — Lê todo o conteúdo de um arquivo para uma string
- [file_put_contents](https://www.php.net/manual/pt_BR/function.file-put-contents.php) — Escreve uma string para um arquivo
- [file](https://www.php.net/manual/pt_BR/function.file.php) — Lê todo o arquivo para um array
- [fileatime](https://www.php.net/manual/pt_BR/function.fileatime.php) — Obtém o último horário de acesso do arquivo
- [filectime](https://www.php.net/manual/pt_BR/function.filectime.php) — Obtém o tempo de modificação do inode do arquivo
- [filemtime](https://www.php.net/manual/pt_BR/function.filemtime.php) — Obtém o tempo de modificação do arquivo
- [filesize](https://www.php.net/manual/pt_BR/function.filesize.php) — Obtém o tamanho do arquivo
- [filetype](https://www.php.net/manual/pt_BR/function.filetype.php) — Lê o tipo do arquivo
- [fopen](https://www.php.net/manual/pt_BR/function.fopen.php) — Abre um arquivo ou URL
- [fputcsv](https://www.php.net/manual/pt_BR/function.fputcsv.php) — Formata a linha como CSV e a escreve em um ponteiro de arquivo
- [fread](https://www.php.net/manual/pt_BR/function.fread.php) — Leitura binary-safe de arquivo
- [fwrite](https://www.php.net/manual/pt_BR/function.fwrite.php) — Escrita binary-safe em arquivos
- [is_dir](https://www.php.net/manual/pt_BR/function.is-dir.php) — Diz se o caminho é um diretório
- [is_file](https://www.php.net/manual/pt_BR/function.is-file.php) — Informa se o arquivo é um arquivo comum
- [is_uploaded_file](https://www.php.net/manual/pt_BR/function.is-uploaded-file.php) — Diz se o arquivo foi enviado por POST HTTP
- [mkdir](https://www.php.net/manual/pt_BR/function.mkdir.php) — Cria um diretório
- [move_uploaded_file](https://www.php.net/manual/pt_BR/function.move-uploaded-file.php) — Move um arquivo enviado para uma nova localização
- [pathinfo](https://www.php.net/manual/pt_BR/function.pathinfo.php) — Retorna informações sobre um caminho de arquivo
- [rename](https://www.php.net/manual/pt_BR/function.rename.php) — Renomeia um arquivo ou diretório
- [rmdir](https://www.php.net/manual/pt_BR/function.rmdir.php) — Remove um diretório
- [stat](https://www.php.net/manual/pt_BR/function.stat.php) — Obtem informações sobre um arquivo
- [tempnam](https://www.php.net/manual/pt_BR/function.tempnam.php) — Cria um nome de arquivo único
- [tmpfile](https://www.php.net/manual/pt_BR/function.tmpfile.php) — Cria um arquivo temporário
- [touch](https://www.php.net/manual/pt_BR/function.touch.php) — Muda o tempo de modificação do arquivo
- [unlink](https://www.php.net/manual/pt_BR/function.unlink.php) — Apaga um arquivo

#### Funções de Arrays
- [array_chunk](https://www.php.net/manual/pt_BR/function.array-chunk.php) — Divide um array em pedaços
- [array_column](https://www.php.net/manual/pt_BR/function.array-column.php) — Retorna os valores de uma coluna do array informado
- [array_combine](https://www.php.net/manual/pt_BR/function.array-combine.php) — Cria um array usando um array para chaves e outro para valores
- [array_count_values](https://www.php.net/manual/pt_BR/function.array-count-values.php) — Conta todos os valores de um array
- [array_diff](https://www.php.net/manual/pt_BR/function.array-diff.php) — Computa as diferenças entre arrays
- [array_fill](https://www.php.net/manual/pt_BR/function.array-fill.php) — Preenche um array com valores
- [array_filter](https://www.php.net/manual/pt_BR/function.array-filter.php) — Filtra elementos de um array utilizando uma função callback
- [array_flip](https://www.php.net/manual/pt_BR/function.array-flip.php) — Permuta todas as chaves e seus valores associados em um array
- [array_intersect](https://www.php.net/manual/pt_BR/function.array-intersect.php) — Calcula a interseção entre arrays
- [array_key_exists](https://www.php.net/manual/pt_BR/function.array-key-exists.php) — Checa se uma chave ou índice existe em um array
- [array_keys](https://www.php.net/manual/pt_BR/function.array-keys.php) — Retorna todas as chaves ou uma parte das chaves de um array
- [array_map](https://www.php.net/manual/pt_BR/function.array-map.php) — Aplica uma função em todos os elementos dos arrays dados
- [array_merge](https://www.php.net/manual/pt_BR/function.array-merge.php) — Combina um ou mais arrays
- [array_pop](https://www.php.net/manual/pt_BR/function.array-pop.php) — Extrai um elemento do final do array
- [array_push](https://www.php.net/manual/pt_BR/function.array-push.php) — Adiciona um ou mais elementos no final de um array
- [array_rand](https://www.php.net/manual/pt_BR/function.array-rand.php) — Escolhe um ou mais elementos aleatórios de um array
- [array_reduce](https://www.php.net/manual/pt_BR/function.array-reduce.php) — Reduz um array para um único valor através de um processo iterativo via função callback
- [array_reverse](https://www.php.net/manual/pt_BR/function.array-reverse.php) — Retorna um array com os elementos na ordem inversa
- [array_search](https://www.php.net/manual/pt_BR/function.array-search.php) — Procura por um valor em um array e retorna sua chave correspondente caso seja encontrado
- [array_shift](https://www.php.net/manual/pt_BR/function.array-shift.php) — Retira o primeiro elemento de um array
- [array_slice](https://www.php.net/manual/pt_BR/function.array-slice.php) — Extrai uma parcela de um array
- [array_splice](https://www.php.net/manual/pt_BR/function.array-splice.php) — Remove uma parcela do array e substitui com outros elementos
- [array_sum](https://www.php.net/manual/pt_BR/function.array-sum.php) — Calcula a soma dos elementos de um array
- [array_unique](https://www.php.net/manual/pt_BR/function.array-unique.php) — Remove os valores duplicados de um array
- [array_unshift](https://www.php.net/manual/pt_BR/function.array-unshift.php) — Adiciona um ou mais elementos no início de um array
- [array_values](https://www.php.net/manual/pt_BR/function.array-values.php) — Retorna todos os valores de um array
- [array_walk](https://www.php.net/manual/pt_BR/function.array-walk.php) — Aplica uma determinada funcão em cada elemento de um array
- [array](https://www.php.net/manual/pt_BR/function.array.php) — Cria um array
- [arsort](https://www.php.net/manual/pt_BR/function.arsort.php) — Ordena um array em ordem descrescente mantendo a associação entre índices e valores
- [asort](https://www.php.net/manual/pt_BR/function.asort.php) — Ordena um array mantendo a associação entre índices e valores
- [compact](https://www.php.net/manual/pt_BR/function.compact.php) — Cria um array contendo variáveis e seus valores
- [count](https://www.php.net/manual/pt_BR/function.count.php) — Conta o número de elementos de uma variável, ou propriedades de um objeto
- [extract](https://www.php.net/manual/pt_BR/function.extract.php) — Importa variáveis para a tabela de símbolos a partir de um array
- [in_array](https://www.php.net/manual/pt_BR/function.in-array.php) — Checa se um valor existe em um array
- [key_exists](https://www.php.net/manual/pt_BR/function.key-exists.php) — Sinônimo de array_key_exists
- [krsort](https://www.php.net/manual/pt_BR/function.krsort.php) — Ordena um array pelas chaves em ordem descrescente
- [ksort](https://www.php.net/manual/pt_BR/function.ksort.php) — Ordena um array pelas chaves
- [list](https://www.php.net/manual/pt_BR/function.list.php) — Cria variáveis como se fossem arrays
- [natcasesort](https://www.php.net/manual/pt_BR/function.natcasesort.php) — Ordena um array utilizando o algoritmo da "ordem natural" sem diferenciar maiúsculas e minúsculas
- [natsort](https://www.php.net/manual/pt_BR/function.natsort.php) — Ordena um array utilizando o algoritmo da "ordem natural"
- [range](https://www.php.net/manual/pt_BR/function.range.php) — Cria um array contendo uma faixa de elementos
- [rsort](https://www.php.net/manual/pt_BR/function.rsort.php) — Ordena um array em ordem descrescente
- [shuffle](https://www.php.net/manual/pt_BR/function.shuffle.php) — Mistura os elementos de um array
- [sizeof](https://www.php.net/manual/pt_BR/function.sizeof.php) — Sinônimo de count
- [sort](https://www.php.net/manual/pt_BR/function.sort.php) — Ordena um array
- [uasort](https://www.php.net/manual/pt_BR/function.uasort.php) — Ordena um array utilizando uma função de comparação definida pelo usuário e mantendo as associações entre chaves e valores
- [uksort](https://www.php.net/manual/pt_BR/function.uksort.php) — Ordena um array pelas chaves utilizando uma função de comparação definida pelo usuário.
- [usort](https://www.php.net/manual/pt_BR/function.usort.php) — Ordena um array pelos valores utilizando uma função de comparação definida pelo usuário

#### Funções de Strings
- [addcslashes](https://www.php.net/manual/pt_BR/function.addcslashes.php) — String entre aspas com barras no estilo C
- [addslashes](https://www.php.net/manual/pt_BR/function.addslashes.php) — Adiciona barras invertidas a uma string
- [bin2hex](https://www.php.net/manual/pt_BR/function.bin2hex.php) — Converte um dado binário em representação hexadecimal
- [chr](https://www.php.net/manual/pt_BR/function.chr.php) — Retorna um caracter específico
- [chunk_split](https://www.php.net/manual/pt_BR/function.chunk-split.php) — Divide uma string em pequenos pedaços
- [count_chars](https://www.php.net/manual/pt_BR/function.count-chars.php) — Retorna informações sobre os caracteres usados numa string
- [crc32](https://www.php.net/manual/pt_BR/function.crc32.php) — Calcula polinômio crc32 de uma string
- [crypt](https://www.php.net/manual/pt_BR/function.crypt.php) — Encriptação unidirecional de string (hashing)
- [echo](https://www.php.net/manual/pt_BR/function.echo.php) — Exibe uma ou mais strings
- [explode](https://www.php.net/manual/pt_BR/function.explode.php) — Divide uma string em strings
- [html_entity_decode](https://www.php.net/manual/pt_BR/function.html-entity-decode.php) — Converte todas as entidades HTML para os seus caracteres
- [htmlentities](https://www.php.net/manual/pt_BR/function.htmlentities.php) — Converte todos os caracteres aplicáveis em entidades html.
- [htmlspecialchars_decode](https://www.php.net/manual/pt_BR/function.htmlspecialchars-decode.php) — Converte especiais entidades HTML para caracteres
- [htmlspecialchars](https://www.php.net/manual/pt_BR/function.htmlspecialchars.php) — Converte caracteres especiais para a realidade HTML
- [implode](https://www.php.net/manual/pt_BR/function.implode.php) — Junta elementos de uma matriz em uma string
- [lcfirst](https://www.php.net/manual/pt_BR/function.lcfirst.php) — Torna minúsculo o primeiro caractere de uma string
- [localeconv](https://www.php.net/manual/pt_BR/function.localeconv.php) — Obtém a informação da formatação numérica
- [ltrim](https://www.php.net/manual/pt_BR/function.ltrim.php) — Retira espaços em branco (ou outros caracteres) do início da string
- [md5_file](https://www.php.net/manual/pt_BR/function.md5-file.php) — Calcula hash md5 de um dado arquivo
- [md5](https://www.php.net/manual/pt_BR/function.md5.php) — Calcula o "hash MD5" de uma string
- [money_format](https://www.php.net/manual/pt_BR/function.money-format.php) — Formata um número como uma string de moeda
- [nl_langinfo](https://www.php.net/manual/pt_BR/function.nl-langinfo.php) — Retorna informação de linguagem e local
- [nl2br](https://www.php.net/manual/pt_BR/function.nl2br.php) — Insere quebras de linha HTML antes de todas newlines em uma string
- [number_format](https://www.php.net/manual/pt_BR/function.number-format.php) — Formata um número com os milhares agrupados
- [ord](https://www.php.net/manual/pt_BR/function.ord.php) — Retorna o valor ASCII do caractere
- [print](https://www.php.net/manual/pt_BR/function.print.php) — Mostra uma string
- [printf](https://www.php.net/manual/pt_BR/function.printf.php) — Mostra uma string formatada
- [rtrim](https://www.php.net/manual/pt_BR/function.rtrim.php) — Retira espaço em branco (ou outros caracteres) do final da string
- [setlocale](https://www.php.net/manual/pt_BR/function.setlocale.php) — Define informações locais
- [sha1_file](https://www.php.net/manual/pt_BR/function.sha1-file.php) — Calcula a hash sha1 de um arquivo
- [sha1](https://www.php.net/manual/pt_BR/function.sha1.php) — Calcula a hash sha1 de uma string
- [similar_text](https://www.php.net/manual/pt_BR/function.similar-text.php) — Calcula a similaridade entre duas strings
- [sprintf](https://www.php.net/manual/pt_BR/function.sprintf.php) — Retorna a string formatada
- [str_getcsv](https://www.php.net/manual/pt_BR/function.str-getcsv.php) — Analisa uma string CSV e retorna os dados em um array
- [str_ireplace](https://www.php.net/manual/pt_BR/function.str-ireplace.php) — Versão que não diferencia maiúsculas e minúsculas de str_replace.
- [str_pad](https://www.php.net/manual/pt_BR/function.str-pad.php) — Preenche uma string para um certo tamanho com outra string
- [str_repeat](https://www.php.net/manual/pt_BR/function.str-repeat.php) — Repete uma string
- [str_replace](https://www.php.net/manual/pt_BR/function.str-replace.php) — Substitui todas as ocorrências da string de procura com a string de substituição
- [str_shuffle](https://www.php.net/manual/pt_BR/function.str-shuffle.php) — Mistura uma string aleatoriamente
- [str_split](https://www.php.net/manual/pt_BR/function.str-split.php) — Converte uma string para um array
- [str_word_count](https://www.php.net/manual/pt_BR/function.str-word-count.php) — Retorna informação sobre as palavras usadas em uma string
- [strcasecmp](https://www.php.net/manual/pt_BR/function.strcasecmp.php) — Comparação de strings sem diferenciar maiúsculas e minúsculas segura para binário
- [strcmp](https://www.php.net/manual/pt_BR/function.strcmp.php) — Comparação de string segura para binário
- [strip_tags](https://www.php.net/manual/pt_BR/function.strip-tags.php) — Retira as tags HTML e PHP de uma string
- [stripcslashes](https://www.php.net/manual/pt_BR/function.stripcslashes.php) — Desfaz o efeito de addcslashes
- [stripos](https://www.php.net/manual/pt_BR/function.stripos.php) — Encontra a primeira ocorrencia de uma string sem diferenciar maiúsculas e minúsculas
- [stripslashes](https://www.php.net/manual/pt_BR/function.stripslashes.php) — Desfaz o efeito de addslashes
- [stristr](https://www.php.net/manual/pt_BR/function.stristr.php) — strstr sem diferenciar maiúsculas e minúsculas
- [strlen](https://www.php.net/manual/pt_BR/function.strlen.php) — Retorna o tamanho de uma string
- [strnatcasecmp](https://www.php.net/manual/pt_BR/function.strnatcasecmp.php) — Comparação de strings sem diferenciar maiúsculas/minúsculas usando o algoritmo "natural order"
- [strnatcmp](https://www.php.net/manual/pt_BR/function.strnatcmp.php) — Comparação de strings usando o algoritmo "natural order"
- [strncasecmp](https://www.php.net/manual/pt_BR/function.strncasecmp.php) — Comparação de string caso-sensitivo de Binário seguro dos primeiros n caracteres
- [strncmp](https://www.php.net/manual/pt_BR/function.strncmp.php) — Comparação de string segura para binário para os primeiros n caracteres
- [strrev](https://www.php.net/manual/pt_BR/function.strrev.php) — Reverte uma string
- [strstr](https://www.php.net/manual/pt_BR/function.strstr.php) — Encontra a primeira ocorrencia de uma string
- [strtolower](https://www.php.net/manual/pt_BR/function.strtolower.php) — Converte uma string para minúsculas
- [strtoupper](https://www.php.net/manual/pt_BR/function.strtoupper.php) — Converte uma string para maiúsculas
- [substr_compare](https://www.php.net/manual/pt_BR/function.substr-compare.php) — A comparação binária entre duas strings de um offset até o limite do comprimento de caracteres
- [substr_count](https://www.php.net/manual/pt_BR/function.substr-count.php) — Conta o número de ocorrências de uma substring
- [substr_replace](https://www.php.net/manual/pt_BR/function.substr-replace.php) — Substitui o texto dentro de uma parte de uma string
- [substr](https://www.php.net/manual/pt_BR/function.substr.php) — Retorna uma parte de uma string
- [trim](https://www.php.net/manual/pt_BR/function.trim.php) — Retira espaço no ínicio e final de uma string
- [ucfirst](https://www.php.net/manual/pt_BR/function.ucfirst.php) — Converte para maiúscula o primeiro caractere de uma string
- [ucwords](https://www.php.net/manual/pt_BR/function.ucwords.php) — Converte para maiúsculas o primeiro caractere de cada palavra
- [wordwrap](https://www.php.net/manual/pt_BR/function.wordwrap.php) — Quebra uma string em um dado número de caracteres

#### Funções de manipulação de variáveis
- [boolval](https://www.php.net/manual/pt_BR/function.boolval.php) — Obtém o valor booleano de uma variável
- [empty](https://www.php.net/manual/pt_BR/function.empty.php) — Determina se a variável é vazia
- [floatval](https://www.php.net/manual/pt_BR/function.floatval.php) — Obtém o valor em ponto flutuante da variável
- [get_defined_vars](https://www.php.net/manual/pt_BR/function.get-defined-vars.php) — Retorna um array com todas variáveis definidas
- [get_resource_type](https://www.php.net/manual/pt_BR/function.get-resource-type.php) — Retorna o tipo de resource
- [gettype](https://www.php.net/manual/pt_BR/function.gettype.php) — Obtém o tipo da variável
- [intval](https://www.php.net/manual/pt_BR/function.intval.php) — Retorna o valor inteiro da variável
- [is_array](https://www.php.net/manual/pt_BR/function.is-array.php) — Verifica se a variável é um array
- [is_bool](https://www.php.net/manual/pt_BR/function.is-bool.php) — Verifica se a variável é um boleano
- [is_callable](https://www.php.net/manual/pt_BR/function.is-callable.php) — Verifica se o conteúdo da variável pode ser chamado como função
- [is_float](https://www.php.net/manual/pt_BR/function.is-float.php) — Informa se a variável é do tipo float
- [is_int](https://www.php.net/manual/pt_BR/function.is-int.php) — Informa se a variável é do tipo inteiro
- [is_null](https://www.php.net/manual/pt_BR/function.is-null.php) — Informa se a variável é NULL
- [is_numeric](https://www.php.net/manual/pt_BR/function.is-numeric.php) — Informa se a variável é um número ou uma string numérica
- [is_object](https://www.php.net/manual/pt_BR/function.is-object.php) — Informa se a variável é um objeto
- [is_resource](https://www.php.net/manual/pt_BR/function.is-resource.php) — Informa se a variável é um resource
- [is_string](https://www.php.net/manual/pt_BR/function.is-string.php) — Informa se a variável é do tipo string
- [isset](https://www.php.net/manual/pt_BR/function.isset.php) — Informa se a variável foi iniciada
- [print_r](https://www.php.net/manual/pt_BR/function.print-r.php) — Imprime informação sobre uma variável de forma legível
- [serialize](https://www.php.net/manual/pt_BR/function.serialize.php) — Generates a storable representation of a value
- [strval](https://www.php.net/manual/pt_BR/function.strval.php) — Retorna o valor string de uma variável
- [unserialize](https://www.php.net/manual/pt_BR/function.unserialize.php) — Creates a PHP value from a stored representation
- [unset](https://www.php.net/manual/pt_BR/function.unset.php) — Destrói a variável especificada
- [var_dump](https://www.php.net/manual/pt_BR/function.var-dump.php) — Mostra informações sobre a variável
- [var_export](https://www.php.net/manual/pt_BR/function.var-export.php) — Mostra ou retorna uma representação estruturada de uma variável

#### Função para trabalhar com datas
- [date](https://www.php.net/manual/pt_BR/function.date.php)

# Constantes

Em PHP, assim como em outras linguagens de programação, é possível definir **constantes**. Ao contrário das variáveis, as constantes possuem um valor fixo ao longo de toda execução do código. Sua função? Remover do código algo que pode ser mudado na programação em um momento posterior, ou por alguma razão específica:
```php
<?php
define('VERSION', '1.0.0');

echo "A versão atual do sistema é " . VERSION;
?>
```

Neste exemplo, a constante `VERSION` pode ser alterada a cada nova versão do sistema que for lançada, e esta informação pode estar presente em mais de um lugar no código. Dessa forma, a manutenção desta informação é bastante facilitada. Note também que a constante está escrita com **todas as letras em maiúsculas**. Esta é uma forma bastante comum de diferenciar variáveis (e atributos em classes) de constantes na maior parte das linguagens de programação.

# Escopo e Variáveis superglobais

## Escopo

**Escopo** em computação refere-se a um *contexto* onde variáveis e funções "existem". Obviamente que o conceito de escopo é bem mais amplo que este, mas para esta disciplina, por hora, é suficiente. Para exemplificar melhor este conceito, veja o exemplo a seguir:
```php
<?php
function media($_notas) {
    $soma = array_sum($_notas);
    $quant = sizeof($_notas);
    return $soma / $quant;
}

$notas = [9, 6, 4, 8];
echo media($notas);

echo $soma; # isso gerará um warning - a variávei $soma não está disponível neste contexto
?>
```

Em PHP, variáveis definidas *fora* de funções (e classes) possuem escopo **global**. Isso quer dizer que podem ser acessadas em qualquer ponto do código, **exceto dentro de funções** (ao menos não diretamente, como será explicado a seguir). Então, no exemplo acima, a variável `$notas` pode ser reutilizada em outros pontos do código, enquanto as variáveis `$_notas`, `$soma` e `$quant` "existem" *apenas dentro da função `media()`*.

É possível utilizar variáveis globais dentro de funções através da utilização da palavra reservada `global`, ou usando a *variável superglobal* `$GLOBALS` (mais sobre as superglobais será explicado a seguir). Veja o exemplo a seguir:

```php
<?php
function consumo() {
    global $km;
    if (!is_numeric($km) || !is_numeric($GLOBALS['litros'])) {
        return 0;
    }
    return floatval($km) / floatval($GLOBALS['litros']);
}

$km = 100;
$litros = 12;

echo consumo();
?>
```

## Superglobais

Tendo compreendido o que é **escopo**, é possível perceber que algumas variáveis não estarão disponíveis em certos contextos, a menos que sejam utilizados certos artifícios. Esse não é o caso das **variáveis superglobais**. As variáveis superglobais do PHP são as seguintes:
- [$GLOBALS](https://www.php.net/manual/pt_BR/reserved.variables.globals.php) - acesso a variáveis globais dentro de contextos onde elas não estariam disponíveis.
- [$\_SERVER](https://www.php.net/manual/pt_BR/reserved.variables.server.php) - acesso a dados do servidor, do pacote HTTP do request e outros mais.
- [$\_GET](https://www.php.net/manual/pt_BR/reserved.variables.get.php) - acesso a dados enviados pelo pacote com o método GET.
- [$\_POST](https://www.php.net/manual/pt_BR/reserved.variables.post.php) - acesso a dados enviados pelo pacote com o método POST.
- [$\_FILES](https://www.php.net/manual/pt_BR/reserved.variables.files.php) - acesso a arquivos que tenham sido enviados num processo de *upload*.
- [$\_COOKIE](https://www.php.net/manual/pt_BR/reserved.variables.cookie.php) - acesso aos *cookies* enviados no pacote.
- [$\_SESSION](https://www.php.net/manual/pt_BR/reserved.variables.session.php) - acesso aos dados da sessão do cliente atual.
- [$\_REQUEST](https://www.php.net/manual/pt_BR/reserved.variables.request.php) - acesso aos dados vindos por algum dos métodos POST, GET ou pelos COOKIES.
- [$\_ENV](https://www.php.net/manual/pt_BR/reserved.variables.environment.php) - variáveis de ambiente enviadas para o php sendo executado atualmente.

Três destas variáveis superglobais serão de extrema importância para o andamento da disciplina, mas neste momento apenas duas delas serão melhor detalhadas: `$_GET` e `$_POST`. Com estas duas variáveis pode-se ter acesso a dados enviados pelo cliente durante seu request. Essas variáveis estão diretamente relacionadas aos [métodos do protocolo HTTP](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html):
- [GET](https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Methods/GET) - método usado para recuperar informações e solicitar arquivos.
- [POST](https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Methods/POST) - método usado para enviar dados maiores, sobretudo vindos de formulários.

Estas variáveis comportam-se como *arrays associativos*, onde os índices são os *nomes dos dados* que foram enviados, e os valores são os valores atribuídos a estes dados. Por exemplo, na url `https://www.google.com/search?q=php&sourceid=chrome`, os dados `q` e `sourceid` estão sendo enviados via método GET (ou seja, diretamente na URL), e seus valores são `php` e `chrome` respectivamente. Este *request* está sendo feito para o arquivo `search`, hospedado no servidor `www.google.com`.

Este formato de envio de dados, `nome=valor[&nome0=valor0]*` é chamado de [*query string*](https://en.wikipedia.org/wiki/Query_string), e é utilizado tanto para enviar dados via o método GET quanto POST, sendo que no caso deste último a *query string* é colocada **dentro do pacote http**.

Veja o exemplo a seguir:
```php
<?php
echo "Seja bem vindo, " . $_GET['nome'];
?>
```

Se este for o conteúdo do arquivo `welcome.php`, hospedado num servidor local (sendo servido usando o servidor embutido do PHP, na porta 3000), um request para `http://localhost:3000/welcome.php?nome=Ranieri` geraria o resultado `Seja bem vindo, Ranieri`.

# Trabalhando com formulários

Para construir Sistemas Web, é preciso que o cliente possa não apenas pedir dados e arquivos do servidor, mas que ele também seja capaz de *enviar dados* para o servidor. A forma mais comum de enviar dados a um servidor é através de **formulários em HTML**. A tag `<form><!-- ... --></form>` cria um [formulário](https://www.w3schools.com/html/html_forms.asp), e possui alguns atributos muito importantes, entre eles destacam-se `action` (a url para onde o formulário será enviado), `method` (método com o qual o *request* será enviado - `"GET"` ou `"POST"`) e `enctype` (tipo de codificação que será utilizada no pacote; este atributo geralmente é utilizado para upload de arquivos, com o valor `"multipart/form-data"`.

Dentro de um formulário podem ser utilizados [alguns tipos de elementos](https://www.w3schools.com/html/html_form_elements.asp), sendo provavelmente o mais comum deles o [`<input>`](https://www.w3schools.com/html/html_form_input_types.asp). Observe o exemplo em [form-example.html](form-example.html); o formulário gerado será similar à imagem abaixo:
![image](https://user-images.githubusercontent.com/2471326/63200941-89523800-c059-11e9-9022-8522cce0f155.png)

Agora, analise mais cuidadosamente o seguinte trecho do código:
```html
<form action="adicionar.php" method="POST">
    <fieldset>
        <legend>Dados pessoais</legend>
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="sobrenome" placeholder="Sobrenome">
        <input type="submit" value="Ok">
    </fieldset>
</form>
```

Neste código é possível que o formulário deve ser enviado ao arquivo `adicionar.php` pelo método *POST*. Os dados enviados serão `nome` e `sobrenome`, com os valores que forem digitados pelo usuário no formulário. Para acessar os dados em `adicionar.php`, pode-se utilizar `$_POST['nome']` e `$_POST['sobrenome']`, conforme o código a seguir:
```php
<?php
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
?>
<h2>Dados recebidos:</h2>
<ul>
    <li>Nome: <strong><?= $nome ?></strong></li>
    <li>Sobrenome: <strong><?= $sobrenome ?></strong></li>
</ul>
```

No exemplo, os dados recebidos no PHP são apenas escritos dentro de um código HTML, mas eles poderiam ser tratados conforme o programador deseje. Tais dados podem ser utilizados para enviar um e-mail, acessar uma outra URL, fazer uma busca num banco de dados ou mesmo podem ser salvos em um arquivo.

Outra forma de enviar dados ao servidor é através de URLs construídas passando dados pelo método `GET`, através de uma *query string* após o caractere `?`. Para saber um pouco mais sobre URLs, veja [este link](https://pt.wikipedia.org/wiki/URL).

# Referências e mais conteúdos
- https://www.php.net/manual/pt_BR/language.constants.syntax.php
- https://www.php.net/manual/pt_BR/language.constants.predefined.php
- https://pt.wikipedia.org/wiki/Escopo_(computação)
- https://www.w3schools.com/tags/ref_httpmethods.asp
- https://developer.mozilla.org/pt-BR/docs/Web/Guide/HTML/Forms/Meu_primeiro_formulario_HTML