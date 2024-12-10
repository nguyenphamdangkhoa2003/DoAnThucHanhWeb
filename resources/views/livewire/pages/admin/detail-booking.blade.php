<div>
    <x-mary-header title="Detail Booking" />
    <div class="bg-base-300 shadow rounded p-5 mb-10">
        <div class="flex justify-between">
            <div class="font-bold">Customer name:</div>
            <div>
                {{ $booking->cus_name }}
            </div>
        </div>
        <div class="flex justify-between">
            <div class="font-bold">Email: </div>
            <div>{{ $booking->cus_email }}</div>
        </div>
        <div class="flex justify-between">
            <div class="font-bold">Phone:</div>
            <div>{{ $booking->cus_phone }}</div>
        </div>
        <div class="flex justify-between">
            <div class="font-bold">Address:</div>
            <div>{{ $booking->cus_address }}</div>
        </div>
    </div>

    <div>
        <x-mary-header title="List type room" />
        @foreach ($booking_details as $item)
            @php
                $room_type = App\Models\RoomType::find($item->room_type_id);
            @endphp
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
        <div class="mt-3 text-xl font-bold">
            @php
                $booking = App\Models\Booking::find($booking_details[0]->booking_id);
            @endphp
            Total: {{ $booking->total_price }}
        </div>
    </div>
</div>
