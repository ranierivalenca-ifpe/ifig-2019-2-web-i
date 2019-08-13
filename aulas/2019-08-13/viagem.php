<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relatório da viagem</title>
</head>
<body>
    <?php
        $gastos = array(
            'combustível', // índice 0
            'diária',      // índice 1
            'almoço',      // índice 2
            'jantar'       // índice 3
        );

        $valores = [
            200, // índice 0
            200, // índice 1
            100, // índice 2
            120  // índice 3
        ];
    ?>
    <h1>Gastos com a viagem</h1>
    <h2>Tipos</h2>
    <ul>
        <?php for ($i = 0; $i < sizeof($gastos); $i++): ?>
            <li><?= $gastos[$i] ?></li>
        <?php endfor ?>
    </ul>
    <h2>Valores</h2>
    <ul>
        <?php foreach ($valores as $valor): ?>
            <li><?= $valor ?></li>
        <?php endforeach ?>

        <!-- <?php for ($i = 0; $i < sizeof($valores); $i++): ?>
            <?php $valor = $valores[$i]; ?>
            <li><?= $valor ?></li>
        <?php endfor ?> -->
    </ul>

    <h1>Herois</h1>
    <?php
        $herois = [
            'Iron Main' => 'Tony Esterco',
            'Hook' => 'Bruce Gancho',
            'Gavião Roqueiro' => 'Clin Tim Barton'
        ];

        echo "<pre>";
        var_dump($herois);
        echo "</pre>";

        // echo "<ul>";
        // foreach ($herois as $nomeDeHeroi => $nomeReal) {
        //     echo "<li>$nomeReal é $nomeDeHeroi</li>";
        // }
        // echo "</ul>";
    ?>
</body>
</html>