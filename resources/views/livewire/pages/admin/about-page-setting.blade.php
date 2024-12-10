<div>
    <x-mary-header title="About page" separator />
    <x-mary-toast />
    <x-mary-form wire:submit="save">
        <x-mary-editor wire:model="content" label="Content" hint="The full product description" />
        <x-slot:actions>
            <x-mary-button label="Save" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-mary-form>
</div>