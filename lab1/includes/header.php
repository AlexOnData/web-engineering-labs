<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle ?? 'Carte de Oaspeti') ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <h1>Carte de Oaspeti</h1>
        <nav>
            <a href="index.php">Adauga mesaj</a>
            <a href="view.php">Vezi mesaje</a>
            <a href="info.php">Info server</a>
        </nav>
    </header>
    <main class="container">
