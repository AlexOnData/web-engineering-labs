# Lab 3 - 5 programe scurte PHP

Cinci programe PHP scurte, fiecare in fisier separat. `index.php` agrega linkuri catre toate.

## Programe
1. **`loop.php`** - bucla `for` care afiseaza numerele de la 5 la 15.
2. **`hello_world.php`** - `echo "Hello World"`.
3. **`hello_php.php`** - mesajul "Hello PHP" stocat intr-o variabila si afisat.
4. **`grade.php`** - clasificator note pe baza punctajului (`if/elseif`):
   - >= 60% -> "Foarte Bine"
   - 45-59% -> "Bine"
   - 33-44% -> "Suficient"
   - < 33% -> "Insuficient"
5. **`day.php`** - `switch/case` pe numarul zilei: 1=Luni, 2=Marti, 3=Miercuri, 4=Joi, 5=Vineri, 6=Sambata, 7=Duminica, `default` = "Numar invalid".

## Fisiere
- `index.php` - lista cu linkuri catre cele 5 programe
- `loop.php`, `hello_world.php`, `hello_php.php`, `grade.php`, `day.php`
- `style.css` - stiluri

## Rulare
**Browser (XAMPP):** copiaza in `htdocs/`, deschide `http://localhost/lab3/`.

**Browser (PHP CLI):** `php -S localhost:8003` apoi `http://localhost:8003/`.

Programele care primesc input (`grade.php`, `day.php`) folosesc query string GET.
