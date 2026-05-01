import { Component } from '@angular/core';
import { ReactiveFormsModule, FormBuilder, Validators } from '@angular/forms';
import { ShoppingListService } from '../../services/shopping-list.service';

@Component({
    selector: 'app-item-form',
    standalone: true,
    imports: [ReactiveFormsModule],
    templateUrl: './item-form.component.html',
    styleUrl: './item-form.component.css'
})
export class ItemFormComponent {
    form;

    constructor(
        private fb: FormBuilder,
        private service: ShoppingListService
    ) {
        this.form = this.fb.nonNullable.group({
            name: ['', [Validators.required, Validators.maxLength(80)]],
            quantity: [1, [Validators.required, Validators.min(0.01)]],
            unit: ['buc', [Validators.required, Validators.maxLength(20)]]
        });
    }

    submit(): void {
        if (this.form.invalid) {
            this.form.markAllAsTouched();
            return;
        }
        const { name, quantity, unit } = this.form.getRawValue();
        this.service.add(name, quantity, unit);
        this.form.reset({ name: '', quantity: 1, unit: 'buc' });
    }
}
