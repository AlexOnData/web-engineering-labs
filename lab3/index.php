<?php $pageTitle = 'Laborator 3 — 5 programe scurte'; ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <h1>Laborator 3 &mdash; 5 programe scurte PHP</h1>
    </header>
    <main class="container">
        <ol class="programs">
            <li>
                <a href="loop.php">1. Loop 5..15</a>
                <span class="hint">Afiseaza numerele de la 5 la 15 folosind un <code>for</code>.</span>
            </li>
            <li>
                <a href="hello_world.php">2. Hello World</a>
                <span class="hint">Afiseaza &bdquo;Hello World&rdquo; folosind <code>echo</code>.</span>
            </li>
            <li>
                <a href="hello_php.php">3. Hello PHP (prin variabila)</a>
                <span class="hint">Stocheaza &bdquo;Hello PHP&rdquo; intr-o variabila si o afiseaza.</span>
            </li>
            <li>
                <a href="grade.php">4. Clasificator note</a>
                <span class="hint">Foarte Bine / Bine / Suficient / Insuficient pe baza punctajului.</span>
            </li>
            <li>
                <a href="day.php">5. Zile saptamana (switch/case)</a>
                <span class="hint">1 = Luni &hellip; 7 = Duminica, default = numar invalid.</span>
            </li>
        </ol>
    </main>
    <footer class="site-footer">
        <p>Web Engineering &mdash; Laborator 3 &mdash; &copy; <?= date('Y') ?></p>
    </footer>
</body>
</html>
