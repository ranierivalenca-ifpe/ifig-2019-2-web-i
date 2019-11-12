<?php

require 'conn.php';

$name = $_POST['name'] ?? false;
$platId = $_POST['platform_id'] ?? false;

if ($name === false || $name == '' || $platId === false || $platId <= 0) {
    echo json_encode(['inserted' => false]);
    exit();
}

$insertStmt = $conn->prepare('
    INSERT INTO games(name, date_added, platform_id) VALUES (?, now(), ?)
');
$insertStmt->execute([$name, $platId]);

echo json_encode([
    'inserted' => true
]);

?>