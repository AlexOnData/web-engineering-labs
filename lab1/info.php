<?php
$pageTitle = 'Informatii server';
require __DIR__ . '/includes/header.php';

$extensions = get_loaded_extensions();
sort($extensions);
?>

<h2>Informatii server</h2>

<table class="server-info">
    <tr><th>Versiune PHP</th><td><?= htmlspecialchars(phpversion()) ?></td></tr>
    <tr><th>Server software</th><td><?= htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'necunoscut') ?></td></tr>
    <tr><th>Server name</th><td><?= htmlspecialchars($_SERVER['SERVER_NAME'] ?? 'necunoscut') ?></td></tr>
    <tr><th>Document root</th><td><?= htmlspecialchars($_SERVER['DOCUMENT_ROOT'] ?? 'necunoscut') ?></td></tr>
    <tr><th>Sistem de operare</th><td><?= htmlspecialchars(PHP_OS) ?></td></tr>
    <tr><th>Data / ora server</th><td><?= htmlspecialchars(date('Y-m-d H:i:s')) ?></td></tr>
    <tr><th>Fus orar</th><td><?= htmlspecialchars(date_default_timezone_get()) ?></td></tr>
    <tr><th>Memory limit</th><td><?= htmlspecialchars(ini_get('memory_limit')) ?></td></tr>
    <tr><th>Extensii incarcate</th><td><?= count($extensions) ?> &mdash; <?= htmlspecialchars(implode(', ', array_slice($extensions, 0, 25))) ?>&hellip;</td></tr>
</table>

<p>
    <a href="phpinfo.php" target="_blank">Deschide <code>phpinfo()</code> complet in tab nou</a>
</p>

<?php require __DIR__ . '/includes/footer.php'; ?>
