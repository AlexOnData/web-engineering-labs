<?php $pageTitle = '2. Hello World'; ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <h1>2. Hello World</h1>
        <nav><a href="index.php">&larr; Inapoi la index</a></nav>
    </header>
    <main class="container">
        <div class="card">
            <h2>Mesajul &bdquo;Hello World&rdquo;</h2>
            <pre class="output"><?php echo "Hello World"; ?></pre>
        </div>
    </main>
</body>
</html>
