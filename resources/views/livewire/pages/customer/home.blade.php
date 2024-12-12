<div>
    <div>
        <div class="md:h-auto pb-4">
            <div class="sm:min-w-full">
                <div class="h-64 md:h-[350px] bg-cover bg-center lg:mx-[-2.5rem]"
                    style="background-image: 
                    url('https://www.sixsensescondao.com/wp-content/uploads/2020/12/resized_SixSenses_ConDao_OceanVilla_David-Mitchener_Architecture-Interiors-Photography-Category-scaled.jpg');">
                </div>
                <div
                    class="w-full md:max-w-7xl m-auto mx-6 md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 md:absolute rounded-md border-primary border-2">
                    <form wire:submit="search"
                        class="flex justify-between items-center bg-base-100 p-3 shadow-md rounded">
                        @csrf
                        <x-mary-datetime label="Start date" wire:model="form.start_date" icon="o-calendar" />
                        <x-mary-datetime label="End date" wire:model="form.end_date" />
                        <x-mary-input type="number" label="Adults" wire:model="form.adults" min="1" />
                        <x-mary-input type="number" label="Children" wire:model="form.children" min="0" />
                        <x-mary-button type="submit" label="Search" />
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section aria-labelledby="products-heading" class="pb-10 pt-6">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-6 relative">
                        <!-- ===== -->
                        <!-- Product grid -->
                        <div class="lg:col-span-4">
                            <div class="flex flex-col gap-3">
                                @if (isset($type_rooms))
                                @foreach ($type_rooms as $type_room)
                                <div class="grid grid-cols-12 bg-white shadow-md rounded-lg">
                                    <div class="col-span-5">
                                        @php
                                            if (isset($type_room->images)) {
                                                $slides = [];
                                                foreach ($type_room->images as $image) {
                                                    $slides[] = [
                                                        'image' => $image->url,
                                                    ];
                                                }
                                            }
                                        @endphp
                                        <div class="w-full h-full">
                                            <x-mary-carousel class="rounded-none rounded-tl-lg" :slides="$slides"
                                                without-indicators />
                                        </div>
                                    </div>
                                    <div class="col-span-7 pb-1 border-b-2 border-y-gray-200">
                                        <div class="card-body p-4">
                                            <div>
                                                <h2 class="font-semibold text-xl">{{ $type_room->room_type_name }}
                                                </h2>
                                                <div class="p-1">
                                                    <div class="flex">
                                                        <x-mary-icon name="o-user" class="me-3" />
                                                        @php
                                                        echo $type_room->children + $type_room->adults;
                                                        @endphp Guest
                                                    </div>
                                                    <div class="flex flex-col gap-5">
                                                        <p>{{ $type_room->description }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <div class="card-actions justify-between p-5">
                                            <div class="flex flex-col gap-2">
                                                <div class="font-semibold">{{$type_room->room_type_name}}</div>
                                                <div class="flex gap-2 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                                    </svg>
                                                    50% deposit required
                                                </div>
                                            </div>
                                            <x-mary-form class="gap-0" wire:submit="selected({{ $type_room->id }})">
                                                <div>
                                                    <div class="w-full flex gap-5 items-center justify-end text-end">
                                                        <div class="flex text-green-600 font-semibold p-2">
                                                            {{ $type_room->count_room_available() }}
                                                            avalilable
                                                        </div>
                                                        <div class="w-20">
                                                            <x-mary-input type="number" min="1" class=" py-2"
                                                                wire:model.defer="roomCount.{{ $type_room->id }}" />
                                                        </div>
                                                    </div>
                                                    <x-slot:actions>
                                                        <p class="text-xl font-semibold">
                                                            VND
                                                            @php
                                                                echo $this->formatCurrencyVND(
                                                                    $type_room->base_price,
                                                                );
                                                            @endphp
                                                        </p>
                                                        @if (!collect($this->selected_type_room)->contains(fn($item) => $item['room_type']['id'] == $type_room->id))
                                                            <x-mary-button class="btn btn-primary" type="submit" spinner>
                                                                SELECT</x-mary-button>
                                                        @else
                                                            <div
                                                                class="bg-green-200 text-green-700 w-fit p-1 rounded shadow-sm">
                                                                You selected
                                                            </div>
                                                        @endif
                                                    </x-slot:actions>
                                                </div>
                                            </x-mary-form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{ $type_rooms->links() }}
                                @endif
                            </div>
                        </div>
                        <!-- Product grid -->

                        <!-- ===== -->

                        <!-- cart booking -->
                        <div class="lg:col-span-2 relative">
                            <x-mary-card class="sticky top-10"
                                subtitle="{{ $formattedStartDate }} - {{ $formattedEndDate }}" separator
                                progress-indicator="selected" class="border rounded shadow">
                                @isset($selected_type_room)
                                                                @foreach ($selected_type_room as $key => $item)
                                                                    <x-mary-list-item :item="$item">
                                                                        <x-slot:value>
                                                                            {{ $item['room_type']['room_type_name'] }}
                                                                        </x-slot:value>
                                                                        <x-slot:sub-value>
                                                                            <div>
                                                                                {{ $item['room_type']['description'] }}
                                                                            </div>
                                                                            <div>
                                                                                x{{ $item['count'] }}
                                                                            </div>
                                                                        </x-slot:sub-value>
                                                                        <x-slot:actions>
                                                                            <x-mary-button icon="o-trash" class="text-red-500"
                                                                                wire:click="deleteTypeRoomSelected({{ $key }})" spinner />
                                                                        </x-slot:actions>
                                                                    </x-mary-list-item>
                                                                @endforeach
                                                                <div class="flex justify-between">
                                                                    <div class="text-xl font-semibold">Total: </div>
                                                                    <div class="text-xl">
                                                                        @php
                                                                            echo $this->formatCurrencyVND($this->getTotalPrice());
                                                                           @endphp
                                                                    </div>
                                                                </div>
                                @endisset
                                <x-slot:actions>
                                    @if (count($selected_type_room) <= 0)
                                        <x-mary-button label="Book" class="btn-primary w-full" disabled="disabled" />
                                    @else
                                        <x-mary-button label="Book" wire:click="redirectBookingPage"
                                            class="btn-primary w-full" spinner />
                                    @endif
                                </x-slot:actions>
                            </x-mary-card>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>