# Estudo de caso - CRUD

Na raiz deste repositório, há um diretório "sistemas", no qual alguns sistemas serão adicionados para servirem de base para estudos de caso. O primeiro deles, que parcialmente analisado aqui, é o [fun-cad](../../sistemas/fun-cad).

Este é um CRUD baseado nos exemplos citados na aula [sobre entidades e relacionamentos](../2019-09-10/), e possui três entidades:

##### `Funcionário`
- **`cpf`**
- `nome`
- `sobrenome`
- `email`

##### `Grau de Parentesco`
- **`Grau`

##### `Dependente`
- **`cpf`**
- `nome`
- `sobrenome`
- *`cpf do funcionário`*
- *`grau de parentesco`*

O sistema em si está apenas parcialmente funcional - não há ainda os fluxos relacionados a atualização de dados (Update). Portanto, pode-se dizer que este sistema possui alguns "*CRD*s", e não "*CRUD*s" =)

## Utilização e navegação

Para usar o sistema, pode-se rodar o [servidor embutido do php](https://www.php.net/manual/pt_BR/features.commandline.webserver.php) diretamente dentro do diretório raiz do projeto (`fun-cad`).

## Estrutura de diretórios e arquivos

O primeiro ponto a ser analisado neste exemplo é a estrutura de diretórios e como os arquivos estão organizados. Antes de mais nada, é importante salientar que esta é apenas **uma das possibilidades** de organização de arquivos / arquitetura de sistema.

Na raiz do sistema, estão:
- o *index* (`index.php`) - a página inicial do sistema
- um arquivo de configuração (`config.php`) - guarda as constantes que serão utilizadas dentro do sistema
- um arquivo de funções (`functions.php`) - declara funções que serão utilizadas dentro do sistema
- parte do HTML que será utilizado dentro das páginas do sistema (`main-top.php` e `main-bottom.php`) - o "*header*" e o "*footer*" do sistema

Os diretórios `funcionarios` e `parentescos` guardam páginas e arquivos relacionados com às respectivas entidades. Poderia haver um outro diretório para a entidade `Dependente`? Sim, poderia. Mas, dada a estrutura do sistema e o fluxo de interação do usuário (que será melhor descrito adiante), a opção foi de manter os scripts relacionados ao controle desta entidade *dentro* do diretório `funcionarios`.

