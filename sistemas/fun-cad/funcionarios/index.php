<?php
require 'funcionarios_functions.php';

$data = get_funcionarios();
$message = $_GET['m'] ?? false;
$error = $_GET['e'] ?? false;
?>



<?php include '../main-top.php' ?>
<div id="breadcrumb">
    <a href="/">Home</a> /
    <a href="index.php"><span>Funcionários</span></a>
</div>
<?php if ($message !== false): ?>
    <div class="alert">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif ?>
<?php if ($error !== false): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif ?>
<h1>Funcionários</h1>
<div id="funcionarios">
    <?php if ($data === false || empty($data)): ?>
        <div class="no-data">
            <h2>Nenhum funcionário cadastrado</h2>
        </div>
    <?php else: ?>
        <?php foreach ($data as $cpf => $func_data): ?>
            <div class="func">
                <div class="info">
                    <h2><?= $func_data['nome'] . ' ' . $func_data['sobrenome'] ?></h2>
                    <h3>(<?= $cpf ?>)</h3>
                </div>
                <div class="actions">
                    <a href="func.php?cpf=<?= $cpf ?>">Informações</a>
                    <a href="remove.php?cpf=<?= $cpf ?>" class="del">Remover</a>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>
<form action="add.php" method="POST">
    <fieldset class="main-form">
        <legend>Adicionar funcionário</legend>
        <div class="flex-fieldset">
            <fieldset>
                <legend>Dados pessoais</legend>

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Ex: 123.456.789.10">

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Ex: Ranieri">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome" placeholder="Ex: Valença">
            </fieldset>
            <fieldset>
                <legend>Contato</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Ex: ranieri@email.com">

                <label for="tel1">Telefone principal</label>
                <input type="phone" name="tel1" id="tel1" placeholder="Ex: 99999-9999">

                <label for="tel2">Telefone secundário</label>
                <input type="phone" name="tel2" id="tel2" placeholder="Ex: 99999-9999">
            </fieldset>
            <fieldset class="full">
                <legend>Endereço</legend>

                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" placeholder="Ex: 55555-000">

                <label for="logradouro">Logradouro</label>
                <input type="text" name="logradouro" id="logradouro" placeholder="Ex: Rua Um">

                <label for="numero">Número</label>
                <input type="text" name="numero" id="numero" placeholder="Ex: 100">

                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" placeholder="Ex: Saramandaia">

                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" placeholder="Ex: Igarassu">

                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado" placeholder="Ex: PE">
            </fieldset>
        </div>
        <input type="submit" value="Ok">
    </fieldset>
</form>

<?php include '../main-bottom.php' ?>