<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello world</title>
    <style>
        li {
            list-style: none;
            display: inline-block;
            padding: 1em;
            border: 1px solid gray;
        }
    </style>
</head>
<body>
    <?php
        $nome = 'ranieri';
        // echo 'o professor é ' . $nome;
        echo "o professor é $nome"; // equivalente a `` em JavaScript
    ?>

    <ul>
    <?php
        for ($i = 0; $i < 10; $i++) {
            if ($i == 5) {
                echo "<li><strong>$i</strong></li>";
            } else {
                echo '<li>' . $i . '</li>';
            }
        }
    ?>
    </ul>

    <ul>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <?php if ($i == 5): ?>
                <li>
                    <strong><?php echo $i; ?></strong>
                </li>
            <?php else: ?>
                <li>
                    <?= $i ?>
                </li>
            <?php endif ?>
        <?php endfor ?>
    </ul>
</body>
</html>