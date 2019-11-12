<?php

require 'conn.php';

$id = $_GET['id'] ?? false;
if ($id === false) {
    echo json_encode(['removed' => false]);
    exit();
}

$stmt = $conn->prepare('DELETE FROM games WHERE id = ?');
$stmt->execute([$id]);

echo json_encode(['removed' => true]);

?>