import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { ShoppingItem } from '../models/shopping-item';

const STORAGE_KEY = 'lab4_shopping_list';

@Injectable({ providedIn: 'root' })
export class ShoppingListService {
    private items$ = new BehaviorSubject<ShoppingItem[]>(this.load());

    getItems(): Observable<ShoppingItem[]> {
        return this.items$.asObservable();
    }

    add(name: string, quantity: number, unit: string): void {
        const newItem: ShoppingItem = {
            id: this.generateId(),
            name: name.trim(),
            quantity,
            unit: unit.trim(),
            bought: false,
            createdAt: new Date().toISOString()
        };
        this.persist([...this.items$.value, newItem]);
    }

    update(id: string, changes: Partial<Omit<ShoppingItem, 'id' | 'createdAt'>>): void {
        const next = this.items$.value.map(item =>
            item.id === id ? { ...item, ...changes } : item
        );
        this.persist(next);
    }

    delete(id: string): void {
        this.persist(this.items$.value.filter(item => item.id !== id));
    }

    toggleBought(id: string): void {
        const item = this.items$.value.find(i => i.id === id);
        if (!item) return;
        this.update(id, { bought: !item.bought });
    }

    clearBought(): void {
        this.persist(this.items$.value.filter(item => !item.bought));
    }

    private persist(items: ShoppingItem[]): void {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
        } catch (e) {
            console.error('Nu am putut salva lista in localStorage', e);
        }
        this.items$.next(items);
    }

    private load(): ShoppingItem[] {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            return raw ? JSON.parse(raw) as ShoppingItem[] : [];
        } catch {
            return [];
        }
    }

    private generateId(): string {
        return Date.now().toString(36) + Math.random().toString(36).slice(2, 8);
    }
}
