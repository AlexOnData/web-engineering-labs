# Lab 1 - Carte de Oaspeti (PHP)

Mini-aplicatie PHP rulabila sub XAMPP. Demonstreaza mai multe notiuni PHP intr-un singur loc.

## Ce face
- Formular HTML cu validare server-side (nume, email, mesaj)
- Persistenta in fisier JSON (fara MySQL) - `data/messages.json`
- Sesiuni PHP pentru mesaje flash dupa submit
- Afisare mesaje intr-un tabel (sortate descrescator dupa data)
- Pagina dedicata cu informatii server si link spre `phpinfo()` complet
- Layout cu include-uri reutilizabile (header / footer) si CSS

## Fisiere
- `index.php` - formular adaugare mesaj
- `submit.php` - procesare POST, validare, salvare in JSON
- `view.php` - afisare lista mesaje
- `info.php` - informatii server (PHP version, OS, extensii etc.)
- `phpinfo.php` - `phpinfo()` complet (deschis intr-un tab nou)
- `includes/header.php`, `includes/footer.php` - layout reutilizabil
- `data/messages.json` - stocare mesaje
- `style.css` - stiluri

## Rulare
**XAMPP:** copiaza folderul `lab1/` in `C:\xampp\htdocs\`, porneste Apache, deschide `http://localhost/lab1/`.

**PHP CLI:** din acest director, ruleaza `php -S localhost:8001` apoi deschide `http://localhost:8001/`.
