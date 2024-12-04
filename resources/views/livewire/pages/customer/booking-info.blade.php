<x-app-layout>
    @section('content')

    <div class="py-12">
        <div class="bg-white">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section aria-labelledby="products-heading" class="pb-10 pt-6">

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-6">
                        <!-- ===== -->
                        <!-- Product grid -->
                        <div class="lg:col-span-4">
                            <div
                                class="flex flex-col mb-5 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:min-w-full">
                                <div>
                                    @php
                                        $slides = [
                                            [
                                                'image' => 'https://diemdenantoan.sgtiepthi.vn/wp-content/uploads/2022/11/SSNVB-Exterior-1.jpg',
                                            ],
                                            [
                                                'image' => 'https://diemdenantoan.sgtiepthi.vn/wp-content/uploads/2022/11/SSNVB-Exterior-1.jpg',
                                            ],
                                            [
                                                'image' => 'https://diemdenantoan.sgtiepthi.vn/wp-content/uploads/2022/11/SSNVB-Exterior-1.jpg',
                                            ],
                                            [
                                                'image' => 'https://diemdenantoan.sgtiepthi.vn/wp-content/uploads/2022/11/SSNVB-Exterior-1.jpg',
                                            ],
                                        ];
                                    @endphp
                                    <div class="md:grid grid-cols-5 md:flex-none overflow-hidden">
                                        <div class="col-span-2 md:max-h-[230px]">
                                            <!-- Hình ảnh cố định -->

                                            <x-mary-carousel :slides="$slides" />
                                        </div>
                                        <div
                                            class="col-span-3 md:flex-auto md:min-h-full flex flex-col p-4 pt-2 leading-normal justify-between">
                                            <h5
                                                class="mb-2 text-2xl md:text-xl font-semibold tracking-tight text-gray-900">
                                                Basement Standard Twin Room
                                            </h5>
                                            <div>
                                                <!-- Số lượng khách cố định -->
                                                <p class="mb-1 font-normal text-gray-700">Số lượng khách</p>
                                                <div class="flex gap-2">
                                                    <small class="rounded-full bg-slate-300 px-1">
                                                        <span>2</span> Người lớn
                                                    </small>
                                                    <small class="rounded-full bg-slate-300 px-1">
                                                        <span>1</span> Trẻ em
                                                    </small>
                                                </div>
                                            </div>
                                            <div>
                                                <!-- Mô tả cố định -->
                                                <p class="mb-1 font-extralight text-s text-gray-700">
                                                    Phòng đơn, tiện nghi đầy đủ, thích hợp cho 2 người.
                                                </p>
                                                <a href="#" class="font-medium text-xs text-blue-600 underline">
                                                    Xem thêm
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cart booking -->
                        <div class="lg:col-span-2">
                            <div class="shadow border rounded bg-white sticky top-5 p-4">

                                <!-- livewire cart-booking -->
                                <div>

                                    <div class="font-bold text-black text-lg">
                                        VND 3,868,800 total
                                    </div>
                                    <div class="py-4">
                                        <div class="md:flex justify-between md:min-w-full py-1 ">
                                            <p>
                                                04 Tháng 12 2024 – 05 Tháng 12 2024
                                            </p>
                                            <p>
                                                1 night
                                            </p>
                                        </div>
                                        <p>1 phòng, 2 khách</p>
                                    </div>

                                    <div wire:loading.remove>
                                        <div class="cart-item border-t py-2">
                                            <div class="flex items-center justify-between">
                                                <p class="font-semibold text-black">Deluxe Double - Rooftop RoomStandard
                                                    Rate</p>
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px"
                                                        viewBox="0 -960 960 960" width="21px" fill="currentColor">
                                                        <path
                                                            d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p>2 guests 1 night</p>
                                                <p>VND 1,996,800</p>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cart-item border-t py-2">
                                                <div class="flex items-center justify-between text-black font-bold">
                                                    <div class="font-semibold ">Total</div>
                                                    <div>
                                                        <p class="font-bold">Giá: 1,500,000 VND</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="text-black flex flex-col justify-between font-bold text-sm pb-5 mb-4">
                                                <p>Deposit: VND 1,934,400</p>
                                                <p>Outstanding balance: VND 1,934,400</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product grid -->
                        <div class="lg:col-span-4">

                            <div class="bg-white border border-gray-200 rounded-lg shadow md:min-w-full px-6">

                                <div class="py-4 flex justify-start items-center">
                                    <span
                                        class="flex items-center justify-center w-10 text-xl h-10 bg-red-400 text-red-800 font-extrabold rounded-full border border-red-700">
                                        1
                                    </span>
                                    <span class="font-bold px-3 text-lg">
                                        Your details
                                    </span>
                                </div>

                                <form class="py-4">
                                    <div class="grid grid-cols-2 gap-5">
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <input type="text"
                                                    class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Họ" />
                                            </label>
                                        </div>
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <input type="text"
                                                    class="no-selection grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Tên" />
                                            </label>
                                        </div>
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <input type="text" wire:model.defer="bookForm.customer_phone"
                                                    class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Email" />
                                            </label>
                                        </div>
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <input type="text" wire:model.defer="bookForm.customer_phone"
                                                    class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Confirm E-mail *" />
                                            </label>
                                        </div>
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <input type="text" wire:model.defer="bookForm.customer_phone"
                                                    class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Phone number" />
                                            </label>
                                        </div>
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <input type="text" wire:model.defer="bookForm.customer_phone"
                                                    class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="How did you hear about us?" />
                                            </label>
                                        </div>

                                        <div class="col-span-2">
                                            <p class="text-blue-500 text-sm py-2">Any person requests</p>
                                            <label class="form-control">
                                                <textarea class="textarea textarea-bordered h-24"
                                                    placeholder="Any person requests"></textarea>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="py-6 flex justify-end items-center text-center">
                                        <!-- The button to open modal -->
                                        <button type="submit">
                                            <label for="my_modal_6"
                                                class="py-2 mt-3 px-11 min-w-full me-2 mb-2 text-sm font-medium text-black focus:outline-none bg-orange-400 rounded-lg border border-gray-200 hover:bg-orange-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                                CONTINUE</label>
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>


                    </div>

                </section>
            </div>
        </div>
    </div>
    @endsection


    @livewire('layout/customer/footer')
</x-app-layout>