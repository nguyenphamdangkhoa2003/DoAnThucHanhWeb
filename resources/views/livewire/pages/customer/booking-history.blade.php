<div>
    <x-mary-header title="Booking history" separator progress-indicator />
    <x-mary-card title="Nice things">
        @foreach ($booking_history as $booking)
            <x-mary-list-item :item="$room_type">
                <x-slot:value>
                    Room Type Name: {{ $room_type->room_type_name }}
                </x-slot:value>
                <x-slot:sub-value>
                    <div>
                        Description {{ $room_type->description }}
                    </div>
                    <div>
                        Price: {{ $room_type->base_price }}
                    </div>
                </x-slot:sub-value>
                <x-slot:actions>
                    <div>
                        {{ $item->quantity }}
                    </div>
                </x-slot:actions>
            </x-mary-list-item>
        @endforeach
    </x-mary-card>
</div>
