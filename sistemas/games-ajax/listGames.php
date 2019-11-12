<?php

require 'conn.php';

$gamesStmt = $conn->query('
    SELECT games.id,
           games.name,
           games.date_added,
           platforms.name AS platform
    FROM games
    LEFT JOIN platforms ON platforms.id = games.platform_id
    ORDER BY games.date_added
');
$gamesData = $gamesStmt->fetchAll();


?>
<?php foreach ($gamesData as $game): ?>
    <tr>
        <td><?= $game['name'] ?></td>
        <td><?= $game['date_added'] ?></td>
        <td><?= $game['platform'] ?></td>
        <td>
            <a class="del-game" href="#" data-game-name="<?= $game['name'] ?>" data-game-id="<?= $game['id'] ?>">&times;</a>
        </td>
    </tr>
<?php endforeach ?>
<?php if (empty($gamesData)): ?>
    <tr>
        <td colspan="4">No games added... =(</td>
    </tr>
<?php endif ?>