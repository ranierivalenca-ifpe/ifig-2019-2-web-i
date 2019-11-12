<?php

require 'conn.php';

$name = $_POST['name'] ?? false;
if ($name === false || $name == '') {
    echo json_encode(['inserted' => false]);
    exit();
}

$insertStmt = $conn->prepare('
    INSERT INTO platforms(name) VALUES (?)
');
$insertStmt->execute([$name]);
echo json_encode([
    'inserted' => true,
    'name' => $name,
    'id' => $conn->lastInsertId()
]);

?>