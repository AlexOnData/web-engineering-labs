<?php
$pageTitle = '3. Hello PHP (prin variabila)';
$message = "Hello PHP";
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <h1>3. Hello PHP (prin variabila)</h1>
        <nav><a href="index.php">&larr; Inapoi la index</a></nav>
    </header>
    <main class="container">
        <div class="card">
            <h2>Afisare folosind o variabila</h2>
            <p>Variabila <code>$message</code> are valoarea <code>"Hello PHP"</code>:</p>
            <pre class="output"><?php echo $message; ?></pre>
        </div>
    </main>
</body>
</html>
