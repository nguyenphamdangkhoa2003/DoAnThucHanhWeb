<div>
    <x-mary-header title="List Room" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-bolt" placeholder="Search..." wire:model.live="search" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" wire:click="redirectAddRoom" />
        </x-slot:actions>
    </x-mary-header>
    {{-- TOAST --}}
    <x-mary-toast class="w-full!" />
    <x-mary-table :headers="$headers" :rows="$bookings" :sort-by="$sortBy" with-pagination>
        @scope('cell_is_avaliable', $booking)
            @if ($room->is_avaliable != '1')
                <x-mary-badge value="Unavailable" class="badge-error" />
            @else
                <x-mary-badge value="Available" class="badge-info" />
            @endif
        @endscope
        @scope('cell_action', $room)
            <x-mary-button icon="o-trash" wire:click.prevent="delete({{ $booking->id }})" spinner
                class="btn-sm text-red-400" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE" />
            <x-mary-button icon="o-pencil" wire:click.prevent="redirectUpdateRoom({{ $booking->id }})" spinner
                class="btn-sm" wire:key="{{ $booking->id }}" />
        @endscope
    </x-mary-table>
</div>
