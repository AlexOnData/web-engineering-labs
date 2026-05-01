<?php
require __DIR__ . '/functions.php';

echo "=== is_prime ===\n";
foreach ([0, 1, 2, 3, 4, 5, 7, 9, 11, 13, 17, 19, 25, 97, 100, 7919] as $n) {
    printf("  %4d -> %s\n", $n, is_prime($n) ? 'prim' : 'nu este prim');
}

echo "\n=== reverse_string ===\n";
foreach (['Hello', 'PHP', 'Salut, lume!', 'staiaSTAIA'] as $s) {
    printf("  '%s' -> '%s'\n", $s, reverse_string($s));
}

echo "\n=== fizzbuzz default 1..15 ===\n";
echo '  ' . implode(', ', fizzbuzz(15)) . "\n";

echo "\n=== fizzbuzz custom 1..20 cu [2 => 'Par', 7 => 'Sapte'] ===\n";
echo '  ' . implode(', ', fizzbuzz(20, [2 => 'Par', 7 => 'Sapte'])) . "\n";

echo "\n=== fizzbuzz custom 1..30 cu trei reguli ===\n";
echo '  ' . implode(', ', fizzbuzz(30, [3 => 'Foo', 5 => 'Bar', 7 => 'Baz'])) . "\n";

echo "\n=== generate_password ===\n";
foreach ([8, 12, 16, 24] as $len) {
    printf("  lungime %2d: %s\n", $len, generate_password($len));
}

echo "\n=== generate_password (eroare la lungime < 4) ===\n";
try {
    generate_password(3);
} catch (InvalidArgumentException $e) {
    printf("  exception: %s\n", $e->getMessage());
}
echo "\n";
