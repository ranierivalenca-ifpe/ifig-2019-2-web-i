<?php
require '../config.php';
require '../functions.php';
include '../funcionarios/funcionarios_functions.php';

$func_cpf = $_GET['cpf'] ?? false;

if ($func_cpf === false) {
    redirect('index.php?e=Erro desconhecido');
}

$func = get_funcionario($func_cpf);
if ($func === false) {
    redirect('index.php?e=Funcionário não encontrado');
}

$data = get_csv_data(DEP_FILENAME);
if ($data !== false) {
    $data = array_filter(
        $data,
        function($el) use ($func_cpf) {
            list($_cpf, , , , $_func_cpf) = $el;
            return trim($_func_cpf) == $func_cpf;
        }
    );
}

$parentesco_data = get_csv_data(PAR_FILENAME);
$message = $_GET['m'] ?? false;

$fullname = $func['nome'] . ' ' . $func['sobrenome'];
?>



<?php include '../main-top.php' ?>
<div id="breadcrumb">
    <a href="/">Home</a> /
    <a href="index.php">Funcionários</a> /
    <a href="func.php?cpf=<?= $func_cpf ?>"><span><?= $fullname ?></span></a>
</div>
<?php if ($message !== false): ?>
    <div class="alert">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif ?>
<h1>Informações de <span><?= $fullname ?></span></h1>
<div id="func-info">
    <fieldset class="main-form">
        <legend>Dados</legend>

        <div class="flex-fieldset">
            <fieldset>
                <legend>Dados pessoais</legend>

                <div class="info">
                    <span class="text">CPF</span>
                    <span class="data"><?= $func['cpf'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Nome</span>
                    <span class="data"><?= $func['nome'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Sobrenome</span>
                    <span class="data"><?= $func['sobrenome'] ?></span>
                </div>
            </fieldset>

            <fieldset>
                <legend>Contato</legend>

                <div class="info">
                    <span class="text">Email</span>
                    <span class="data"><?= $func['email'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Telefone primário</span>
                    <span class="data"><?= $func['tel1'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Telefone Secundário</span>
                    <span class="data"><?= $func['tel2'] ?></span>
                </div>
            </fieldset>

            <fieldset class="full">
                <legend>Endereço</legend>

                <div class="info">
                    <span class="text">Cep</span>
                    <span class="data"><?= $func['cep'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Logradouro</span>
                    <span class="data"><?= $func['logradouro'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Número</span>
                    <span class="data"><?= $func['numero'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Bairro</span>
                    <span class="data"><?= $func['bairro'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Cidade</span>
                    <span class="data"><?= $func['cidade'] ?></span>
                </div>
                <div class="info">
                    <span class="text">Estado</span>
                    <span class="data"><?= $func['estado'] ?></span>
                </div>
            </fieldset>
        </div>
    </fieldset>
</div>



<h2>Dependentes</h2>
<div id="dependents">
    <table>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Grau de parentesco</th>
            <th>Ações</th>
        </tr>
        <?php if ($data === false || empty($data)): ?>
            <tr>
                <td colspan="5">Nenhum registro</td>
            </tr>
        <?php else: ?>
            <?php foreach ($data as $dependente): ?>
                <?php
                    list($cpf, $nome,$sobrenome,$parentesco) = $dependente;
                ?>
                <tr>
                    <td><?= $cpf ?></td>
                    <td><?= $nome ?></td>
                    <td><?= $sobrenome ?></td>
                    <td><?= $parentesco ?></td>
                    <td>
                        <a href="dependentes/remove.php?cpf=<?= $cpf ?>&func=<?= $func_cpf ?>">&times;</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
    <form action="dependentes/add.php" method="POST">
        <fieldset class="main-form">
            <legend>Adicionar Dependente</legend>
            <label for="parentesco">Grau de parentesco</label>
            <select name="parentesco" id="parentesco">
                <?php foreach ($parentesco_data as $parentesco): ?>
                    <?php list($grau) = $parentesco; ?>
                    <option value="<?= $grau ?>"><?= $grau ?></option>
                <?php endforeach ?>
            </select>

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="Ex: 123.456.789.10">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Ex: Pingo">

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" placeholder="Ex: Valença">

            <input type="hidden" name="func_cpf" value="<?= $func_cpf ?>"">

            <input type="submit" value="Ok">
        </fieldset>
    </form>
</div>

<?php include '../main-bottom.php' ?>