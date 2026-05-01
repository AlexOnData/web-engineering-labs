<?php
$pageTitle = '5. Zile saptamana (switch/case)';

$day = null;
$dayName = null;

if (isset($_GET['day']) && $_GET['day'] !== '') {
    $day = (int) $_GET['day'];

    switch ($day) {
        case 1:
            $dayName = 'Luni';
            break;
        case 2:
            $dayName = 'Marti';
            break;
        case 3:
            $dayName = 'Miercuri';
            break;
        case 4:
            $dayName = 'Joi';
            break;
        case 5:
            $dayName = 'Vineri';
            break;
        case 6:
            $dayName = 'Sambata';
            break;
        case 7:
            $dayName = 'Duminica';
            break;
        default:
            $dayName = 'Numar invalid';
            break;
    }
}
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
        <h1>5. Zile saptamana (switch/case)</h1>
        <nav><a href="index.php">&larr; Inapoi la index</a></nav>
    </header>
    <main class="container">
        <div class="card">
            <h2>Converteste un numar in ziua saptamanii</h2>
            <form method="get">
                <label>
                    Numar (1 &ndash; 7, sau orice altceva pentru &bdquo;invalid&rdquo;)
                    <input type="number" name="day"
                           value="<?= htmlspecialchars((string) ($day ?? 1)) ?>" required>
                </label>
                <button type="submit">Determina ziua</button>
            </form>

            <?php if ($dayName !== null): ?>
                <div class="result">
                    Pentru numarul <strong><?= (int) $day ?></strong>, ziua este:
                    <strong class="grade"><?= htmlspecialchars($dayName) ?></strong>
                </div>
            <?php endif; ?>

            <table class="rules">
                <thead><tr><th>Numar</th><th>Zi</th></tr></thead>
                <tbody>
                    <tr><td>1</td><td>Luni</td></tr>
                    <tr><td>2</td><td>Marti</td></tr>
                    <tr><td>3</td><td>Miercuri</td></tr>
                    <tr><td>4</td><td>Joi</td></tr>
                    <tr><td>5</td><td>Vineri</td></tr>
                    <tr><td>6</td><td>Sambata</td></tr>
                    <tr><td>7</td><td>Duminica</td></tr>
                    <tr><td>altceva</td><td>Numar invalid</td></tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
