<?php require '../config.php' ?>
<?php require '../functions.php' ?>
<?php
$data = get_csv_data(PAR_FILENAME);
$message = $_GET['m'] ?? false;
?>



<?php include '../main-top.php' ?>
<div id="breadcrumb">
    <a href="/">Home</a> /
    <a href="index.php"><span>Graus de parentesco</span></a>
</div>
<?php if ($message !== false): ?>
    <div class="alert">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif ?>
<h1>Graus de Parentesco</h1>
<table>
    <tr>
        <th>Grau de parentesco</th>
        <th>Ações</th>
    </tr>
    <?php if ($data === false || empty($data)): ?>
        <tr>
            <td colspan="2">Nenhum registro</td>
        </tr>
    <?php else: ?>
        <?php foreach ($data as $row => $parentesco): ?>
            <?php
                list($grau) = $parentesco;
            ?>
            <tr>
                <td><?= $grau ?></td>
                <td>
                    <a href="remove.php?row=<?= $row ?>">&times;</a>
                </td>
            </tr>
        <?php endforeach ?>
    <?php endif ?>
</table>
<form action="add.php" method="POST">
    <fieldset class="main-form">
        <legend>Adicionar Grau de parentesco</legend>
        <label>
            Grau de parentesco
            <input type="text" name="grau" placeholder="Ex: mãe, pai, filho, ...">
        </label>
        <input type="submit" value="Ok">
    </fieldset>
</form>

<?php include '../main-bottom.php' ?>