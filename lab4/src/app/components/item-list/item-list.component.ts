import { Component } from '@angular/core';
import { AsyncPipe } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Observable, BehaviorSubject, combineLatest, map } from 'rxjs';
import { ShoppingListService } from '../../services/shopping-list.service';
import { ShoppingItem } from '../../models/shopping-item';

type Filter = 'all' | 'pending' | 'bought';

interface Counts {
    all: number;
    pending: number;
    bought: number;
}

@Component({
    selector: 'app-item-list',
    standalone: true,
    imports: [AsyncPipe, FormsModule],
    templateUrl: './item-list.component.html',
    styleUrl: './item-list.component.css'
})
export class ItemListComponent {
    private filter$ = new BehaviorSubject<Filter>('all');

    filter: Filter = 'all';
    items$: Observable<ShoppingItem[]>;
    counts$: Observable<Counts>;

    editingId: string | null = null;
    editName = '';

    constructor(private service: ShoppingListService) {
        const allItems$ = this.service.getItems();

        this.items$ = combineLatest([allItems$, this.filter$]).pipe(
            map(([items, filter]) => {
                if (filter === 'pending') return items.filter(i => !i.bought);
                if (filter === 'bought') return items.filter(i => i.bought);
                return items;
            })
        );

        this.counts$ = allItems$.pipe(
            map(items => ({
                all: items.length,
                pending: items.filter(i => !i.bought).length,
                bought: items.filter(i => i.bought).length
            }))
        );
    }

    setFilter(f: Filter): void {
        this.filter = f;
        this.filter$.next(f);
    }

    toggle(item: ShoppingItem): void {
        this.service.toggleBought(item.id);
    }

    delete(item: ShoppingItem): void {
        if (confirm(`Stergi articolul "${item.name}"?`)) {
            this.service.delete(item.id);
        }
    }

    startEdit(item: ShoppingItem): void {
        this.editingId = item.id;
        this.editName = item.name;
    }

    saveEdit(item: ShoppingItem): void {
        const trimmed = this.editName.trim();
        if (trimmed) {
            this.service.update(item.id, { name: trimmed });
        }
        this.cancelEdit();
    }

    cancelEdit(): void {
        this.editingId = null;
        this.editName = '';
    }

    clearBought(): void {
        if (confirm('Stergi toate articolele cumparate?')) {
            this.service.clearBought();
        }
    }
}
