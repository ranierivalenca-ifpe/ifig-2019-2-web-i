# O HTTP é stateless!

O protocolo HTTP é um protocolo [**stateless**](https://en.wikipedia.org/wiki/Stateless_protocol). Isso significa que cada *request* HTTP é **independente** dos demais, e não há persistência de nenhuma informação entre os *requests*. Ou seja, quando um usuário acessa um sistema e pede vários arquivos distintos, do ponto de vista do servidor não há uma forma de saber, diretamente pelo protocolo, se os *requests* estão vindo do mesmo cliente ou se de clientes diferentes.

# Cookies

Em computação, sobretudo em Desenvolvimento Web, *cookies* são pequenos pedaços de informação enviados pelo cliente ao servidor a cada *request* que é feito, no cabeçalho do pacote HTTP.

Os cookies são *setados* pelo servidor em algum *response* a partir do cabeçalho `Set-Cookie: nome=valor` e, a partir deste ponto, podem ficar salvos no cliente. Quando um cookie está salvo no cliente, ele é enviado dentro do cabeçalho de cada *request* que for feito para o domínio. O escopo onde os cookies são enviados pode ser ajustado durante o estabelecimento do cookie pelo servidor, através de certas diretivas:
- `Domain`: os cookies passam a ser enviados também em requisições feitas a subdomínios.
- `Path`: pode-se limitar em quais caminhos dentro do domínio o cookie é enviado.

Outra característica importante sobre os cookies é o seu *tempo de vida*. Por padrão, um cookie fica armazenado no cliente até que ele seja fechado. Apesar disso, a duração dos cookies pode ser estendida pelas diretivas `Max-Age` (tempo máximo que um cookie permanece ativo) ou `Expires` (até quando um cookie estará ativo).

Mais informações sobre cookies podem ser encontradas [no MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Cookies), [no MDN em português (tradução em progresso na data de escrita deste documento)](https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Cookies), [na Wikipedia](https://pt.wikipedia.org/wiki/Cookie_(informática)) ou em buscas simples pela web =)

## Cookies na prática (em PHP)

### Setando cookies

Para criar cookies em PHP, pode-se setá-los diretamente com os cabeçalhos do HTTP usando a função `header`:
```php
<?php
header('Set-Cookie: cookie-no-header=1');
?>
```

Mas há uma forma mais simples de fazer isso, através da função [`setcookie()`](https://www.php.net/manual/en/function.setcookie.php):
```php
<?php
setcookie('cookie-no-setcookie', 'mais legal', time() + 60*60*24*30);
?>
```

No primeiro exemplo o cookie é setado da forma mais simples possível, apenas com um nome e um valor. Naquele caso, assim que o browser for fechado o cookie será excluído. No segundo caso, o cookie está sendo setado com a diretiva `expires`, cujo valor é o terceiro parâmetro da função `setcookie`. No exemplo, o cookie está sendo setado para expirar num [*timestamp* ](https://www.unixtimestamp.com) igual ao *timestamp* atual (`time()`) mais `2592000` segundos, ou 30 dias (`30` dias * `24` horas por dia * `60` minutos por hora * `60` segundos por minuto). Obviamento o mesmo poderia ser feito usando a função `header()`, mas a função `setcookie()` facilita a legibilidade do código.

### Lendo cookies

Os cookies recebidos por um script PHP podem ser acessados pela variável superglobal [`$_COOKIE`](https://www.php.net/manual/pt_BR/reserved.variables.cookies.php), que é um array associativo e funciona da mesma forma que as superglobais `$_GET` e `$_POST` já estudadas.

O exemplo a seguir lista os cookies que estão sendo enviados para o script:
```php
<?php
echo "<pre>";
foreach($_COOKIE as $name => $value) {
    echo $name . " = " . $value . PHP_EOL;
}
echo "</pre>";
?>
```

### Usando cookies - um exemplo simples

Observe o código [`count-visits.php`](examples/count-visits.php). Com este código relativamente simples é possível contar a quantidade de vezes que um usuário visitou uma página:
```php
<?php
$visits = $_COOKIE['visits'] ?? 0; // coloca na variável $visits o valor do cookie 'visits' ou 0, caso o cookie não tenha sido enviado pelo request
$visits++;
setcookie('visits', $visits); // seta o cookie 'visits' com o valor da variável $visits
?>
```

### Como *NÃO* utilizar cookies

Como já explicado, o HTTP é stateless. Mas, também como já mostrado, é possível "persistir" pequenos pedaços de informação no lado do cliente, de forma que a cada *request* estas informações são enviadas para o servidor através dos cookies. Tendo isso em mente, pode-se pensar em sistemas que verificam se um dado cliente tem ou não permissão para acessar uma área específica do sistema através dos cookies que são enviados pelo *request*.

Com base nisso, foi construído um sistema de autenticação baseado em cookies, no diretório [`cookie-auth`](examples/cookie-auth/) dentro dos exemplos desta aula.

A premissa do sistema é simples: a página `index.php` só pode ser acessada por usuários autenticados. E como verificar se um *request* feito por um cliente usando o protocolo HTTP, que é stateless, é de um cliente autenticado? Bom, a primeira ideia é verificar se algum cookie está setado e se está um valor esperado. Neste exemplo, o valor do cookie `autorizado` está sendo guardado na variável `$autorizado` caso ele esteja sendo enviado; caso não esteja sendo enviado, a variável fica com o valor `false`. Então, é verificado se o valor deste cookie é `1`, e caso não seja o cliente é encaminhado para uma página de login.

A página de login pede por uma senha num formulário, que é submetido a um script de verificação (`auth.php`) - caso a senha seja igual a um valor predefinido, o cookie `autorizado` é setado para o valor `1`, significando "autenticado"; caso contrário, este cookie é setado para o valor `0`, significando "não autenticado", e então o cliente é encaminhado de volta à `index.php`.

O grande problema deste sistema consiste justamente no fato que o faze funcionar: os cookies ficam armazenados no cliente. Desta forma, esta é uma informação que deve ser utilizada para o próprio cliente, mas não é uma informação que pode-se considerar *segura* nem, principalmente, **confiável**, visto que um cabeçalho HTTP pode ser modificado antes de chegar ao servidor, seja por um programa externo de captura de tráfego de dados, seja pelo próprio navegador através de plugins simples.

# Sessões

Por causa deste problema, cookies não são uma a melhor alternativa para a construção de mecanismos de autenticação. Para lidar com isso, é preciso de um mecanismo que, **no lado do servidor**, seja capaz de identificar se um usuário está ou não autenticado. E para diferenciar qual cliente está ou não autenticado, utilizam-se cookies. Este é o princípio do mecanismo de **controle de sessão** implementado por praticamente todos os sistemas web.

O controle de sessão funciona da seguinte forma:
1. O servidor identifica se um cookie específico está sendo enviado pelo cliente.
    1.1. Caso esteja, ele pega o valor deste cookie e carrega as informações que estão armazenadas no próprio servidor *indexadas* pelo valor na **variável de sessão**.
    1.2. Caso não esteja, ele gera um valor aleatório, seta o cookie com este valor, e armazena a **variável de sessão** no próprio servidor, *indexada* pelo valor gerado.
2. O código executado no servidor pode ler e alterar as informações na **variável de sessão**.
3. Após a execução do código, as alterações feitas na **variável de sessão** são salvas no servidor.

Desta forma, o cookie armazenado no cliente funciona como uma chave para que o servidor possa acessar os dados daquele cliente. Mas calma, os cookies não podem ser alterados pelo cliente? Sim, mas neste caso o problema é minimizado pelo fato de que os valores gerados para o cookie geralmente são longos e aleatórios, de forma que dificilmente um cliente é capaz de "adivinhar" o cookie de um outro cliente sem ter acesso direto a ele.

## Sessões no PHP

No PHP, todo o processo de controle de sessão é feito através de uma única chamada à função `session_start()`. Esta chamada faz todo o processo de verificar e setar o cookie `PHPSESSID`, e seta a [variável superglobal `$_SESSION`](https://www.php.net/manual/pt_BR/reserved.variables.session.php), que é um array associativo de valores que ficam salvos no próprio servidor.

O código [`count-visits-session.php`](examples/count-visits-session.php) faz praticamente o mesmo que o `count-visits.php` mostrado anteriormente faz - conta a quantidade de vezes que um cliente visitou a página. A diferença aqui está no fato de que esta informação, que antes ficava salva diretamente no cookie, agora está salva **no lado do servidor**. Observe o código abaixo e veja as diferenças:
```php
<?php
session_start(); // inicia a sessão, setando a variável $_SESSION com os devidos valores, e setando o cookie PHPSESSID caso seja necessário
$visits = $_SESSION['visits'] ?? 0; // coloca na variável $visits o valor da variável de sessão no índice 'visits', caso exista, ou 0 caso contrário
$visits++;
$_SESSION['visits'] = $visits; // seta o valor do índice 'visits' na variável de sessão com o valor da variável $visits
?>
```

## Mecanismo de autenticação

Utilizando sessões, é possível criar mecanismos de autenticação menos vulneráveis, uma vez que a informação de que um usuário está ou não autenticado agora fica salva no servidor. O sistema de autenticação no diretório [`session-auth`](examples/session-auth/) no diretório de exemplos faz exatamente o mesmo que o anterior, feito com cookies, mas desta vez utilizando sessão.

Este sistema é apenas um exemplo de como funciona um mecanismo de autenticação simples. Num sistema real, a principal diferença fica por conta do script de autenticação - tipicamente um sistema pode ser acessado por vários usuários, e cada um destes usuários tem seu login e senha.

### Exemplo de sistema - Lista de tarefas

Um exemplo comum que pode ser citado é um sistema de lista de tarefas para usuários. As entidades num sistema mais simples deste seriam as seguintes:

##### `Usuario`
- **`email`**
- `senha`
- `nome`

##### `Tarefa`
- **`id`**
- `tarefa`
- *`email do Usuario`*

Neste sistema, é preciso:
- um sistema de cadastro de usuários, onde os usuários podem cadastrar seus dados (nome, login e senha);
- um sistema de autenticação, que verifica se o login e senha digitados correspondem a um dos usuários;
- um crud para tarefas que os usuários têm a fazer.

Vale notar que, após autenticado, a lista de tarefas de cada usuário será diferente, já que um usuário só deve ter acesso às suas tarefas.