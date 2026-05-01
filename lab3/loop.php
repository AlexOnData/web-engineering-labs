<?php $pageTitle = '1. Loop 5..15'; ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <h1>1. Loop 5..15</h1>
        <nav><a href="index.php">&larr; Inapoi la index</a></nav>
    </header>
    <main class="container">
        <div class="card">
            <h2>Numerele de la 5 la 15</h2>
            <pre class="output"><?php
for ($i = 5; $i <= 15; $i++) {
    echo $i . PHP_EOL;
}
?></pre>
        </div>
    </main>
</body>
</html>
