<?php

require 'conn.php';

$platformsStmt = $conn->query('
    SELECT platforms.id,
           platforms.name
    FROM platforms
    ORDER BY name
');
$platformsData = $platformsStmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Manage your games</h1>
    <table id="games">
        <thead>
            <tr>
                <th>Game</th>
                <th>Date added</th>
                <th>Platform</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <hr>
    <form action="addGame.php" id="addGame">
        <h2>Add Game</h2>

        <label>
            Game name
            <input type="text" name="name" placeholder="Game name...">
        </label>

        <label>
            Platform
            <select name="platform_id" required>
                <option readonly value="">Choose a platform</option>
                <option disabled>--</option>
                <optgroup label="Registered platforms">
                    <?php foreach ($platformsData as $platform): ?>
                        <option value="<?= $platform['id'] ?>"><?= $platform['name'] ?></option>
                    <?php endforeach ?>
                </optgroup>
                <option disabled>--</option>
                <option value="-1">Add new...</option>
            </select>
        </label>

        <input type="submit">
    </form>
    <div id="addPlatform" class="hide">
        <div class="fade"></div>
        <form action="addPlatform.php">
            <h2>Add Platform</h2>
            <label>
                Platform name
                <input type="text" name="name" placeholder="Ex: Steam, Epic Games, ...">
            </label>
            <input type="submit">
        </form>
    </div>

    <script src="app.js"></script>
</body>
</html>