## ifig-2019-2-web-i-manha
# Desenvolvimento para Web I - 2019.2 - Manhã

Neste repositório ficarão disponíveis os códigos feitos em sala de aula, assim como as resoluções dos exercícios (feitas em sala de aula ou não).

Os códigos não serão naturalmente comentados, mas sintam-se à vontade para enviar pull-requests com comentários.

## Sobre a disciplina

### Quais linguagens preciso saber?
Para começar, nesta disciplina você **precisa** saber *HTML*. Um pouco cd *CSS* também é bom, apesar de vermos um tiquinho na disciplina. Você também precisa compreender como funciona o modelo *cliente-servidor*, além de conhecer o protocolo *HTTP*.

### O que devo aprender nesta disciplina?
Esta disciplina trata de conceitos de CRUD (Create, Read, Update, Delete), as operações mais básicas em uma Aplicação Web, na linguagem [**PHP**](https://php.net) (PHP Hyper Processor). Além disso, trabalhamos com **JavaScript** para front-end, passando por conceitos de DOM (Document Object Model), algumas coisas de [jquery](https://jquery.com), um pouco de ECMAScript 6 ([ref1](https://www.w3schools.com/js/js_es6.asp), [ref2](http://es6-features.org/)) e algum framework de aplicações web reativas ([React](https://pt-br.reactjs.org/), [Vue](https://vuejs.org/), [Ember](https://emberjs.com/) ou algum similar).

### Qual o horário de atendimento?
O professor estará disponível semanalmente no Campus, além dos horários das aulas e projetos, nos seguintes horários:
- **Terça-feira, 16h às 18h** *OU* **Quarta-feira, 15h às 17h**
- **Quinta-feira, 10h às 12h**

### Como será a avaliação?
A disciplina, assim como deve ser, será dividida em duas unidades, e a média final será a média aritmética das médias das unidades.

A primeira unidade terá duas notas: uma virá das notas dos exercícios [quase] semanais da disciplina. A outra virá de uma avaliação individual, com consulta, realizada numa data a ser definida. Os detalhes da correção dos exercícios, cálculo para notas dos exercícios e método da avaliação serão divulgados oportunamente.

A nota da segunda unidade virá de um projeto que será realizado junto com a disciplina de *Programação Orientada a Objetos*. Os detalhes serão divulgados em algum momento entre final de outubro/2019 e novembro/2019. De forma geral, o projeto consistirá na construção de um WebService (a ser construído em POO) e uma interface de acesso (a ser construída nesta disciplina). Esta interface deverá ser construída em PHP ou JavaScript, a critério da equipe.

### Progressão das aulas e exercícios:

#### PHP
- Introdução à disciplina e revisão de HTML
- Construção de tabelas dinâmicas com PHP
- Construção de tabelas dinâmicas com dados contidos num arquivo
- Inserção de dados informados pelo usuário num arquivo
- Remoção de dados de um arquivo
- Revisão
- Mecanismo de sessão
- Mecanismo de autenticação
- Revisão
- *Avaliação (?)*
- Conexão com banco de dados

#### JavaScript e CSS
- CSS 3
- DOM (*Document Object Model*)
- *Interval* e *Timeout* em JavaScript
- JQuery
- Frameworks reativos
- Projeto

## FAQ

### Como rodar uma aplicação PHP?
È importante lembrar que PHP é uma linguagem interpretada, e portanto seus scrits são executados pelo *programa PHP*. Portanto, para executar um código em PHP devemos executar o comando `php caminho_do_script.php`.

### E se eu quiser ver minha aplicação PHP no browser?
Um uso comum de scripts escritos em PHP é gerar códigos em HTML, que frequentemente são visualizados num browser (Chrome, Firefox, etc). Para ver o resultado de um código PHP em um browser, é preciso que o código esteja disponível num servidor. Esse servidor pode ser o [Apache](https://httpd.apache.org/), o [NGINX](https://www.nginx.com/).

Mas talvez o servidor mais simples (e funcional para trabalhar com PHP) seja o próprio [servidor embutido do PHP](https://www.php.net/manual/pt_BR/features.commandline.webserver.php). Para executá-lo, basta entrar num diretório (`cd caminho_do_diretorio`), que será o *document root*, e digitar o comando `php -S localhost:8000`; assim, um servidor será iniciado na porta `8000`, ouvindo apenas requests vindos do `localhost`. Se quiser que o servidor escute todos os requests de qualquer ponto da rede, basta trocar o `localhost` por `0.0.0.0`; da mesma forma, pode-se trocar a porta para qualquer número. Assim, este comando também poderia ser `php -S 0.0.0.0:8765`: teríamos um servidor escutando todas as interfaces na porta `8765`.

### Quero comentar os códigos para aprender mais e ajudar meus colegas de classe. Como fazer?
Se você quer fazer isso, comece lendo [este artigo do Digital Ocean](https://www.digitalocean.com/community/tutorials/como-criar-um-pull-request-no-github-pt) (que inclusive está em português =^.^=). Você pode tentar fazer isso sozinho ou consultar o professor no horário de atendimento.

### Como trabalhar com esse repositório?
