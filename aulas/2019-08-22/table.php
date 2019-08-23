<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabela Dinâmica</title>
    <style>
        * {
            font-family: monospace;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80vw;
            margin: auto;
        }
        table, td, th {
            border: 1px solid hsl(0, 0%, 50%);
            border-collapse: collapse;
            padding: .5em;
            text-align: center;
        }
        tr:nth-child(even) {
            background: hsl(240, 80%, 90%);
        }
    </style>
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
</body>
</html>