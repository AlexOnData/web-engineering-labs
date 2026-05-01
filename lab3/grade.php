<?php
$pageTitle = '4. Clasificator note';

$marks = null;
$grade = null;

if (isset($_GET['marks']) && $_GET['marks'] !== '') {
    $marks = (int) $_GET['marks'];

    if ($marks >= 60) {
        $grade = 'Foarte Bine';
    } elseif ($marks >= 45) {
        $grade = 'Bine';
    } elseif ($marks >= 33) {
        $grade = 'Suficient';
    } else {
        $grade = 'Insuficient';
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
        <h1>4. Clasificator note</h1>
        <nav><a href="index.php">&larr; Inapoi la index</a></nav>
    </header>
    <main class="container">
        <div class="card">
            <h2>Calificativ pe baza punctajului</h2>
            <form method="get">
                <label>
                    Punctaj (%)
                    <input type="number" name="marks" min="0" max="100"
                           value="<?= htmlspecialchars((string) ($marks ?? 60)) ?>" required>
                </label>
                <button type="submit">Calculeaza</button>
            </form>

            <?php if ($grade !== null): ?>
                <div class="result">
                    Pentru <strong><?= (int) $marks ?>%</strong>, calificativul este:
                    <strong class="grade"><?= htmlspecialchars($grade) ?></strong>
                </div>
            <?php endif; ?>

            <table class="rules">
                <thead><tr><th>Punctaj</th><th>Calificativ</th></tr></thead>
                <tbody>
                    <tr><td>&ge; 60%</td><td>Foarte Bine</td></tr>
                    <tr><td>45% &ndash; 59%</td><td>Bine</td></tr>
                    <tr><td>33% &ndash; 44%</td><td>Suficient</td></tr>
                    <tr><td>&lt; 33%</td><td>Insuficient</td></tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
