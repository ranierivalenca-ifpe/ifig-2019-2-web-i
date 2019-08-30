<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabela Dinâmica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // Uma forma de fazer...
        # $dados = array_map('str_getcsv', file('data.csv'));

        // Outra forma...
        # $linhas = file('data.csv');
        # $dados = array_map(function($linha) {
        #     return explode(',', $linha);
        # }, $linhas);

        // E uma outra forma...
        $linhas = file('data.csv');
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
        </tr>
        <?php foreach ($dados as $dado): ?>
            <?php
                list($nome, $idade, $pais) = $dado;
            ?>
            <tr>
                <td><?= $nome ?></td>
                <td><?= $idade ?></td>
                <td><?= $pais ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <div class="actions">
        <a href="form.php">Adicionar funcionário</a>
    </div>
</body>
</html>