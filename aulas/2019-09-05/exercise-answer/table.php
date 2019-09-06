<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.html' ?>
</head>
<body>
    <?php
        include 'constantes.php';
        // Uma forma de fazer...
        # $dados = array_map('str_getcsv', file('data.csv'));

        // Outra forma...
        # $linhas = file('data.csv');
        # $dados = array_map(function($linha) {
        #     return explode(',', $linha);
        # }, $linhas);

        // E uma outra forma...
        $linhas = file(FILENAME);
        $dados = [];
        foreach($linhas as $linha) {
            // pode ser assim...
            # $dados[] = explode(',', $linha);

            // ou assim...
            $dados[] = str_getcsv($linha);

            // ou de outras formas
        }

        // E tem outras formas de fazer ainda, seja criativo =)

    ?>
    <h1>Funcionários Estrangeiros</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>País de Origem</th>
            <th>Ações</th>
        </tr>
        <?php /*for ($i = 0; $i < sizeof($dados); $i++):*/ ?>
        <?php foreach ($dados as $i => $dado): ?>
            <?php
                // list($nome, $idade, $pais) = $dados[$i];
                list($nome, $idade, $pais) = $dado;
            ?>
            <tr>
                <td><?= $nome ?></td>
                <td><?= $idade ?></td>
                <td><?= $pais ?></td>
                <td>
                    <a href="remover.php?id=<?= $i ?>">X</a>
                </td>
            </tr>
        <?php /*endfor*/ ?>
        <?php endforeach ?>
    </table>
    <div class="actions">
        <a href="form.php">Adicionar funcionário</a>
    </div>
</body>
</html>