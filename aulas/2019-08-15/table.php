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
        $dados = [
            ['Zelda', 35, 'Bhutan'],
            ['Dorene', 26, 'Tajikistan'],
            ['Myrna', 23, 'Armenia'],
            ['Shelia', 31, 'New Zealand'],
            ['Shad', 30, 'Kiribati'],
            ['Nicol', 30, 'Uruguay'],
            ['Candra', 34, 'Georgia'],
            ['Ronna', 28, 'Madagascar'],
            ['Chauncey', 28, 'Singapore'],
            ['Marc', 21, 'Togo']
        ];
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