# Lab 4 - Lista de Cumparaturi (Angular)

Aplicatie Angular 18 cu standalone components - **varianta B** din cele patru oferite in brief.

## Functionalitati
- CRUD complet pentru articole (nume, cantitate, unitate, status cumparat, data creare)
- Reactive Forms cu validare (nume obligatoriu, cantitate > 0)
- Persistenta in `localStorage` (datele raman dupa refresh sau intre sesiuni)
- Filtrare in UI: Toate / De cumparat / Cumparate, cu numaratori live
- Editare in-place a articolelor (Enter salveaza, Escape anuleaza)
- Stergere individuala + actiune "Sterge cumparate"
- Bifare / debifare ca status "cumparat"

## Stack
- Angular 18 standalone components (fara NgModule)
- TypeScript
- Reactive Forms
- RxJS (BehaviorSubject pentru state)
- localStorage pentru persistenta

## Structura
```
src/
├── index.html
├── main.ts                                  bootstrapApplication
├── styles.css
└── app/
    ├── app.component.{ts,html,css}          shell-ul aplicatiei
    ├── app.config.ts                        ApplicationConfig
    ├── models/
    │   └── shopping-item.ts                 interfata ShoppingItem
    ├── services/
    │   └── shopping-list.service.ts         CRUD + persistenta localStorage
    └── components/
        ├── item-form/                       formular adaugare (Reactive Forms)
        └── item-list/                       lista + filtre + editare
```

## Rulare
```
npm install     (deja rulat)
npm start
```
Aplicatia se deschide automat la `http://localhost:4200/`.

Pentru a opri: `Ctrl+C` in terminal.

## Build de productie
```
npm run build
```
Output: `dist/lab4-shopping-list/`.
