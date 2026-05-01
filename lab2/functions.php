<?php

/**
 * Returns true if $n is a prime number, false otherwise.
 */
function is_prime(int $n): bool {
    if ($n < 2) {
        return false;
    }
    if ($n === 2) {
        return true;
    }
    if ($n % 2 === 0) {
        return false;
    }
    $limit = (int) floor(sqrt($n));
    for ($i = 3; $i <= $limit; $i += 2) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

/**
 * Reverses a string without using strrev().
 * Multibyte-safe so it handles Romanian diacritics correctly.
 */
function reverse_string(string $s): string {
    $reversed = '';
    $length = mb_strlen($s, 'UTF-8');
    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= mb_substr($s, $i, 1, 'UTF-8');
    }
    return $reversed;
}

/**
 * Returns the FizzBuzz sequence from 1 to $n with custom rules.
 *
 * $rules is a map of divisor => label. Default: [3 => 'Fizz', 5 => 'Buzz'].
 * Rules are applied in insertion order; if multiple divisors match the same
 * number, their labels are concatenated (e.g. 15 -> "FizzBuzz").
 */
function fizzbuzz(int $n, array $rules = [3 => 'Fizz', 5 => 'Buzz']): array {
    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        $label = '';
        foreach ($rules as $divisor => $word) {
            if ($divisor > 0 && $i % $divisor === 0) {
                $label .= $word;
            }
        }
        $result[] = $label === '' ? (string) $i : $label;
    }
    return $result;
}

/**
 * Generates a cryptographically random password of length $n.
 * Guarantees at least one uppercase letter, lowercase letter, digit and special character.
 *
 * @throws InvalidArgumentException when $n is less than 4.
 */
function generate_password(int $n): string {
    if ($n < 4) {
        throw new InvalidArgumentException('Lungimea parolei trebuie sa fie cel putin 4.');
    }

    $upper    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lower    = 'abcdefghijklmnopqrstuvwxyz';
    $digits   = '0123456789';
    $specials = '!@#$%^&*()-_=+[]{};:,.?';

    $chars = [
        $upper[random_int(0, strlen($upper) - 1)],
        $lower[random_int(0, strlen($lower) - 1)],
        $digits[random_int(0, strlen($digits) - 1)],
        $specials[random_int(0, strlen($specials) - 1)],
    ];

    $all = $upper . $lower . $digits . $specials;
    $allLen = strlen($all);
    for ($i = 4; $i < $n; $i++) {
        $chars[] = $all[random_int(0, $allLen - 1)];
    }

    // Fisher-Yates shuffle so the four guaranteed chars are not always at the start.
    for ($i = count($chars) - 1; $i > 0; $i--) {
        $j = random_int(0, $i);
        [$chars[$i], $chars[$j]] = [$chars[$j], $chars[$i]];
    }

    return implode('', $chars);
}
