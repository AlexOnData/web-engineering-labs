# Lab 2 - 4 functii PHP

Cele patru functii cerute, implementate in `functions.php`, plus interfata web pentru testarea fiecareia in browser.

## Functii (in `functions.php`)
1. **`is_prime($n)`** - verifica daca un numar este prim. Optimizat: itereaza doar pana la sqrt(n) si sare numerele pare.
2. **`reverse_string($s)`** - inverseaza un sir fara `strrev()`. Foloseste `mb_strlen` / `mb_substr` ca sa fie multibyte-safe (suporta diacritice).
3. **`fizzbuzz($n, $rules)`** - secventa FizzBuzz parametrizabila. Al doilea argument e un array `divizor => eticheta`; default `[3 => 'Fizz', 5 => 'Buzz']`, dar accepta orice reguli (ex. `[2 => 'Par', 7 => 'Sapte']`). Daca mai multi divizori se aplica, etichetele se concateneaza.
4. **`generate_password($n)`** - parola criptografic aleatoare (`random_int`) cu cel putin un caracter din fiecare clasa: majuscula, minuscula, cifra, special. La final aplica un Fisher-Yates shuffle. Arunca `InvalidArgumentException` daca `n < 4`.

## Fisiere
- `functions.php` - definitiile celor 4 functii
- `index.php` - UI web cu cate o sectiune per functie
- `cli_demo.php` - apeluri demonstrative pentru rulare din CLI
- `style.css` - stiluri

## Rulare
**Browser (XAMPP):** copiaza in `htdocs/`, deschide `http://localhost/lab2/`.

**Browser (PHP CLI):** `php -S localhost:8002` apoi `http://localhost:8002/`.

**CLI demo:** `php -f cli_demo.php` - executa toate apelurile demonstrative.
