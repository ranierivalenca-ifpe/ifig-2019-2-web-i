# Introdução ao PHP e Servidor embutido do PHP

## PHP

**PHP** é tanto uma *linguagem de programação* quando uma *aplicação* utilizada para interpretar scripts que são escritos nesta linguagem.

A documentação do PHP está disponível **[aqui](https://www.php.net/manual/pt_BR/index.php)**.

## Servidor PHP embutido

O PHP, a partir da versão 5.4 (a versão atual do PHP é a 7.3.8), tem um *servidor web embutido*, que permite a disponibilização de scripts e arquivos utilizando o protocolo http, geralmente para fins de teste.

Para iniciar este servidor, basta entrar num diretório (qualquer um) pelo terminal e digitar o comando `php -S localhost:8000`. Isso irá iniciar um servidor web na porta `8000`, escutando apenas requests vindos de `localhost`. Note o parâmetro `-S` escrito em letra *maiúscula*. Para mudar a porta, basta trocar o `8000` por qualquer valor entre 1024 e 65535. Para o servidor escutar requests vindos de qualquer máquina na rede, utilize `0.0.0.0` no lugar de `localhost`.

A documentação sobre este servidor está disponível **[aqui](https://www.php.net/manual/pt_BR/features.commandline.webserver.php)**.
