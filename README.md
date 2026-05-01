## Lab 1 — Carte de Oaspeti (PHP + XAMPP)

Mini-aplicatie "Carte de Oaspeti" care demonstreaza mai multe notiuni PHP intr-un singur loc:

- formular HTML cu validare server-side
- persistenta intr-un fisier JSON (fara dependenta MySQL — ruleaza imediat din XAMPP)
- sesiuni PHP pentru mesaje flash dupa submit
- afisarea mesajelor intr-un tabel
- pagina `info.php` cu `phpinfo()` (confirma rularea sub XAMPP)
- include-uri reutilizabile (header/footer) si CSS

### Fisiere
- `lab1/index.php` — formular de adaugare
- `lab1/submit.php` — proceseaza POST, valideaza, salveaza in JSON
- `lab1/view.php` — afiseaza toate mesajele
- `lab1/info.php` — `phpinfo()` + variabile server
- `lab1/includes/header.php`, `lab1/includes/footer.php` — layout reutilizabil
- `lab1/data/messages.json` — stocare
- `lab1/style.css`

### Rulare
1. Copiaza directorul `lab1/` in `C:\xampp\htdocs\` (sau creeaza un symlink).
2. Porneste Apache din XAMPP Control Panel.
3. Acceseaza `http://localhost/lab1/`.

---

## Lab 2 — 4 functii PHP

### Functii
1. `is_prime($n)` — verificare numar prim (cazuri marginale: <2, 2, paritate, divizori pana la √n).
2. `reverse_string($s)` — inversare fara `strrev()`, multibyte-safe.
3. `fizzbuzz($n, $rules)` — `$rules` e un array `divizor => eticheta`; default `[3 => 'Fizz', 5 => 'Buzz']`, dar accepta reguli custom (ex. `[2 => 'Par', 7 => 'Sapte']`).
4. `generate_password($n)` — garanteaza cel putin o majuscula, minuscula, cifra, caracter special; restul aleator dintr-un alfabet combinat; `shuffle` la final.

### Fisiere
- `lab2/functions.php` — definitiile functiilor
- `lab2/index.php` — UI care permite testarea fiecarei functii in browser
- `lab2/cli_demo.php` — apeluri demonstrative pentru `php -f`

### Rulare
- Browser: `lab2/` in `htdocs/` → `http://localhost/lab2/`
- CLI: `php -f lab2/cli_demo.php`

---

## Lab 3 — 5 programe scurte PHP

### Programe
1. `loop.php` — `for` de la 5 la 15.
2. `hello_world.php` — `echo "Hello World"`.
3. `hello_php.php` — `$message = "Hello PHP"; echo $message;`.
4. `grade.php` — clasificator note: ≥60 "Foarte Bine", 45-59 "Bine", 33-44 "Suficient", <33 "Insuficient".
5. `day.php` — `switch` zile saptamana: 1=Luni, 2=Marti, 3=Miercuri, 4=Joi, 5=Vineri, 6=Sambata, 7=Duminica, default = "Numar invalid".

`lab3/index.php` agrega linkuri catre cele 5 programe.

### Rulare
- Browser sau CLI; toate functioneaza la fel.

---

## Lab 4 — Angular Shopping List (varianta B)

Varianta aleasa din cele 4 oferite in brief: **B — Aplicatie de Gestionare a Listei de Cumparaturi**.

### Functionalitati
- CRUD complet pentru articole (nume, cantitate, unitate, status "cumparat")
- Reactive Forms cu validare (nume obligatoriu, cantitate > 0)
- Persistenta in `localStorage` (fara backend separat)
- Filtrare: toate / de cumparat / cumparate
- Standalone components (Angular 17+)

### Stack
- Angular 17+ standalone components
- TypeScript
- Reactive Forms
- `localStorage` pentru persistenta

### Structura (`lab4/`)
- `src/app/models/shopping-item.ts` — interfata model
- `src/app/services/shopping-list.service.ts` — CRUD + persistenta
- `src/app/components/item-form/` — formular adaugare/editare
- `src/app/components/item-list/` — afisare + actiuni
- `src/app/app.component.*` — shell

### Rulare
```
cd lab4
npm install
ng serve
```
Acces: `http://localhost:4200`.
