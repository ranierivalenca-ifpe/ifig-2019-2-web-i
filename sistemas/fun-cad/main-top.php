<?php require_once 'config.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    $_title = TITLE;
    if (($title ?? false) !== false) {
        $_title .= " - $title";
    }
    ?>
    <title><?= $_title ?></title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <nav>
        <a href="/" class="brand">FunCad</a>
    </nav>