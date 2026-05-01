import { Component } from '@angular/core';
import { ItemFormComponent } from './components/item-form/item-form.component';
import { ItemListComponent } from './components/item-list/item-list.component';

@Component({
    selector: 'app-root',
    standalone: true,
    imports: [ItemFormComponent, ItemListComponent],
    templateUrl: './app.component.html',
    styleUrl: './app.component.css'
})
export class AppComponent {}
