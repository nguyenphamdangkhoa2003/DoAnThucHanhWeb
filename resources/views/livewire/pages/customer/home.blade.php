   <div>
       <div>
           <div class="md:h-auto pb-4">
               <div class="sm:min-w-full">
                   <div class="h-64 md:h-[350px] bg-cover bg-center lg:mx-[-2.5rem]"
                       style="background-image: 
                    url('https://www.sixsensescondao.com/wp-content/uploads/2020/12/resized_SixSenses_ConDao_OceanVilla_David-Mitchener_Architecture-Interiors-Photography-Category-scaled.jpg');">
                   </div>
                   <div class="w-full max-w-7xl m-auto md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 md:absolute">
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
                       <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-6">
                           <!-- ===== -->
                           <!-- Product grid -->
                           <div class="lg:col-span-4">
                               <div class="flex flex-col gap-3">
                                   @if (isset($type_rooms))
                                       @foreach ($type_rooms as $type_room)
                                           <div class="card card-side bg-base-100 shadow-xl">
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
                                               <div class="w-2/5">
                                                   <x-mary-carousel :slides="$slides" without-indicators />
                                               </div>
                                               <div class="card-body">
                                                   <h2 class="card-title">{{ $type_room->room_type_name }}</h2>
                                                   <div>{{ $type_room->description }}</div>
                                                   <div class="flex flex-col">
                                                       <div class="flex">
                                                           <x-mary-icon name="o-user" class="me-3" />
                                                           @php
                                                               echo $type_room->children + $type_room->adults;
                                                           @endphp Guest
                                                       </div>
                                                       <div class="flex text-green-600 font-semibold">
                                                           {{ $type_room->count_room_available() }}
                                                           avalilable
                                                       </div>
                                                   </div>
                                                   <div class="card-actions justify-end">
                                                       <x-mary-form wire:submit="selected({{ $type_room->id }})">
                                                           <x-mary-input type="number" min="1"
                                                               wire:model.defer="roomCount.{{ $type_room->id }}" />
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
                                                                   <x-mary-button class="btn btn-primary" type="submit"
                                                                       spinner> SELECT</x-mary-button>
                                                               @else
                                                                   <div
                                                                       class="bg-green-200 text-green-700 w-fit p-1 rounded shadow-sm">
                                                                       You selected
                                                                   </div>
                                                               @endif
                                                           </x-slot:actions>
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
                           <div class="lg:col-span-2">
                               <x-mary-card subtitle="{{ $formattedStartDate }} - {{ $formattedEndDate }}" separator
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
                                           <x-mary-button label="Book" class="btn-primary w-full"
                                               disabled="disabled" />
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
