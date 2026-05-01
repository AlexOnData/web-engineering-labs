<?php
$pageTitle = 'Mesaje primite';
require __DIR__ . '/includes/header.php';

$dataFile = __DIR__ . '/data/messages.json';
$messages = [];
if (file_exists($dataFile)) {
    $raw = file_get_contents($dataFile);
    $messages = json_decode($raw, true) ?: [];
}

usort($messages, fn($a, $b) => strcmp($b['created_at'], $a['created_at']));

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<?php if ($flash): ?>
    <div class="flash flash-<?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>

<h2>Mesaje primite (<?= count($messages) ?>)</h2>

<?php if (empty($messages)): ?>
    <p class="empty">Nu exista mesaje inca. <a href="index.php">Adauga primul mesaj</a>.</p>
<?php else: ?>
    <table class="messages">
        <thead>
            <tr>
                <th>Data</th>
                <th>Nume</th>
                <th>Email</th>
                <th>Mesaj</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td><?= htmlspecialchars($msg['created_at']) ?></td>
                    <td><?= htmlspecialchars($msg['name']) ?></td>
                    <td><?= htmlspecialchars($msg['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
