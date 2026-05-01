<?php
$pageTitle = 'Adauga mesaj';
require __DIR__ . '/includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
$old = $_SESSION['old'] ?? [];
unset($_SESSION['old']);
?>

<?php if ($flash): ?>
    <div class="flash flash-<?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>

<form action="submit.php" method="post" class="card">
    <h2>Lasa un mesaj</h2>

    <label>
        Nume
        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '') ?>" required maxlength="50">
    </label>
    <?php if (!empty($errors['name'])): ?>
        <p class="error"><?= htmlspecialchars($errors['name']) ?></p>
    <?php endif; ?>

    <label>
        Email
        <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required maxlength="100">
    </label>
    <?php if (!empty($errors['email'])): ?>
        <p class="error"><?= htmlspecialchars($errors['email']) ?></p>
    <?php endif; ?>

    <label>
        Mesaj
        <textarea name="message" rows="4" required maxlength="500"><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
    </label>
    <?php if (!empty($errors['message'])): ?>
        <p class="error"><?= htmlspecialchars($errors['message']) ?></p>
    <?php endif; ?>

    <button type="submit">Trimite</button>
</form>

<?php require __DIR__ . '/includes/footer.php'; ?>
