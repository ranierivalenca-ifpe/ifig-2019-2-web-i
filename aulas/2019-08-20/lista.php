<?php
# ...
$linhas = file('teste.txt');
// var_dump($linhas);
// exit();
for($i = 0; $i < sizeof($linhas); $i++) {
    $linhas[$i] = trim($linhas[$i]);
}
# ...
?>
<ul>
    <?php foreach ($linhas as $linha): ?>
        <li><?= $linha ?></li>
    <?php endforeach ?>
</ul>