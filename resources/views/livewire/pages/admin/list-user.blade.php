<div>
    <x-mary-header title="Users" separator>
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-bolt" placeholder="Search..." wire:model.live="search" />
        </x-slot:middle>
    </x-mary-header>
    <x-mary-table :headers="$headers" :rows="$users" :sort-by="$sortBy" with-pagination>
        @scope('cell_role', $user)
            @if ($user->role == 'admin')
                <x-mary-badge value="{{ $user->role }}" class="badge-error" />
            @else
                <x-mary-badge value="{{ $user->role }}" class="badge-info" />
            @endif
        @endscope
    </x-mary-table>
</div>