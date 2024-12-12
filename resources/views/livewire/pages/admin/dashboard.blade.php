<div>
    <x-mary-header title="Dashboard" separator />
    <x-mary-button label="Switch" wire:click="switch" spinner />
    <h3>Rooms</h3>
    <x-mary-chart wire:model="rooms_chart" />
    <h3>Revenue</h3>
    <x-mary-select icon="o-calendar-date-range" :options="$select_revenue" wire:model.live="selected_revenue" />
    <h1>{{ $selected_revenue }}</h1>
</div>
