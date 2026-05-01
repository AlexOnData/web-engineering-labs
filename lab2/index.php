<?php
require __DIR__ . '/functions.php';

$primeResult = null;
$reverseResult = null;
$fizzbuzzResult = null;
$passwordResult = null;
$passwordError = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'prime') {
        $n = (int) ($_POST['prime_n'] ?? 0);
        $primeResult = ['n' => $n, 'is_prime' => is_prime($n)];
    } elseif ($action === 'reverse') {
        $s = (string) ($_POST['reverse_s'] ?? '');
        $reverseResult = ['original' => $s, 'reversed' => reverse_string($s)];
    } elseif ($action === 'fizzbuzz') {
        $n = max(1, (int) ($_POST['fb_n'] ?? 15));
        $rules = [];
        $divisors = $_POST['fb_divisor'] ?? [];
        $labels = $_POST['fb_label'] ?? [];
        foreach ($divisors as $i => $d) {
            $d = (int) $d;
            $l = trim((string) ($labels[$i] ?? ''));
            if ($d > 0 && $l !== '') {
                $rules[$d] = $l;
            }
        }
        if (empty($rules)) {
            $rules = [3 => 'Fizz', 5 => 'Buzz'];
        }
        $fizzbuzzResult = [
            'n' => $n,
            'rules' => $rules,
            'sequence' => fizzbuzz($n, $rules),
        ];
    } elseif ($action === 'password') {
        $len = (int) ($_POST['pw_len'] ?? 12);
        try {
            $passwordResult = ['length' => $len, 'password' => generate_password($len)];
        } catch (InvalidArgumentException $e) {
            $passwordError = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laborator 2 &mdash; 4 functii PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <h1>Laborator 2 &mdash; 4 functii PHP</h1>
        <p class="subtitle">Verificare numar prim &middot; Inversare sir &middot; FizzBuzz &middot; Generator parole</p>
    </header>
    <main class="container">

        <section class="card">
            <h2>1. Verificare numar prim</h2>
            <form method="post">
                <input type="hidden" name="action" value="prime">
                <label>
                    Numar
                    <input type="number" name="prime_n" min="0" value="<?= htmlspecialchars((string) ($_POST['prime_n'] ?? 17)) ?>" required>
                </label>
                <button type="submit">Verifica</button>
            </form>
            <?php if ($primeResult !== null): ?>
                <div class="result">
                    <strong><?= (int) $primeResult['n'] ?></strong>
                    este
                    <?= $primeResult['is_prime'] ? '<span class="ok">numar prim</span>' : '<span class="ko">nu este numar prim</span>' ?>.
                </div>
            <?php endif; ?>
        </section>

        <section class="card">
            <h2>2. Inversare sir (fara <code>strrev()</code>)</h2>
            <form method="post">
                <input type="hidden" name="action" value="reverse">
                <label>
                    Sir de caractere
                    <input type="text" name="reverse_s" value="<?= htmlspecialchars((string) ($_POST['reverse_s'] ?? 'Salut, lume!')) ?>" required>
                </label>
                <button type="submit">Inverseaza</button>
            </form>
            <?php if ($reverseResult !== null): ?>
                <div class="result">
                    <div>Original: <code><?= htmlspecialchars($reverseResult['original']) ?></code></div>
                    <div>Inversat: <code><?= htmlspecialchars($reverseResult['reversed']) ?></code></div>
                </div>
            <?php endif; ?>
        </section>

        <section class="card">
            <h2>3. FizzBuzz cu reguli personalizate</h2>
            <form method="post">
                <input type="hidden" name="action" value="fizzbuzz">
                <label>
                    Limita superioara N
                    <input type="number" name="fb_n" min="1" max="1000" value="<?= htmlspecialchars((string) ($_POST['fb_n'] ?? 15)) ?>" required>
                </label>
                <fieldset class="rules">
                    <legend>Reguli (divizor &rarr; eticheta)</legend>
                    <?php
                    $defaultDivisors = $_POST['fb_divisor'] ?? [3, 5, ''];
                    $defaultLabels = $_POST['fb_label'] ?? ['Fizz', 'Buzz', ''];
                    for ($i = 0; $i < 3; $i++):
                    ?>
                        <div class="rule-row">
                            <input type="number" name="fb_divisor[]" min="1" placeholder="divizor"
                                   value="<?= htmlspecialchars((string) ($defaultDivisors[$i] ?? '')) ?>">
                            <input type="text" name="fb_label[]" placeholder="eticheta"
                                   value="<?= htmlspecialchars((string) ($defaultLabels[$i] ?? '')) ?>">
                        </div>
                    <?php endfor; ?>
                </fieldset>
                <button type="submit">Genereaza</button>
            </form>
            <?php if ($fizzbuzzResult !== null): ?>
                <div class="result">
                    <div class="rules-summary">
                        Reguli folosite:
                        <?php foreach ($fizzbuzzResult['rules'] as $d => $w): ?>
                            <code><?= (int) $d ?> &rarr; <?= htmlspecialchars($w) ?></code>
                        <?php endforeach; ?>
                    </div>
                    <ol class="sequence">
                        <?php foreach ($fizzbuzzResult['sequence'] as $value): ?>
                            <li><?= htmlspecialchars($value) ?></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            <?php endif; ?>
        </section>

        <section class="card">
            <h2>4. Generator de parole sigure</h2>
            <form method="post">
                <input type="hidden" name="action" value="password">
                <label>
                    Lungime
                    <input type="number" name="pw_len" min="4" max="128" value="<?= htmlspecialchars((string) ($_POST['pw_len'] ?? 16)) ?>" required>
                </label>
                <button type="submit">Genereaza parola</button>
            </form>
            <?php if ($passwordError !== null): ?>
                <div class="result error"><?= htmlspecialchars($passwordError) ?></div>
            <?php elseif ($passwordResult !== null): ?>
                <div class="result">
                    Parola (lungime <?= (int) $passwordResult['length'] ?>):
                    <code class="password"><?= htmlspecialchars($passwordResult['password']) ?></code>
                </div>
            <?php endif; ?>
        </section>

    </main>
    <footer class="site-footer">
        <p>Web Engineering &mdash; Laborator 2 &mdash; &copy; <?= date('Y') ?></p>
    </footer>
</body>
</html>
