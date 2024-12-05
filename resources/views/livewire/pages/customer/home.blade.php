<x-app-layout>
    <div>
        <div class="md:h-auto pb-4">
            <div class="sm:min-w-full">
                <div class="h-64 md:h-[350px] w-full bg-cover bg-center relative"
                    style="background-image: 
                    url('https://www.sixsensescondao.com/wp-content/uploads/2020/12/resized_SixSenses_ConDao_OceanVilla_David-Mitchener_Architecture-Interiors-Photography-Category-scaled.jpg');">
                </div>
                <div class="w-full m-auto md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 md:absolute">
                    <div>
                        <div class="p-6 shadow bg-white rounded border-orange-400 border-2 mb-3">
                            <form class="w-full">
                                <div class="md:grid-cols-12 items-center gap-5 grid grid-cols-2">
                                    <div class="col-span-4">
                                        <div class="relative">
                                            <input type="date"
                                                class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="Select date">
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-in
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-span-4">
                                        <div class="relative">
                                            <input type="date"
                                                class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="Select date">
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-out
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-span-2 items-center flex gap-10 relative" wire:model.live="adult">
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                                                peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Người
                                            lớn
                                        </label>
                                        <select id="underline_select" wire:model="adult"
                                            class="block py-2.5 px-2 w-1/2 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                            <option class="px-2 mx-4" selected value="1">1</option>
                                            <option class="px-2 mx-4" value="2">2</option>
                                            <option class="px-2 mx-4" value="3">3</option>
                                            <option class="px-2 mx-4" value="4">4</option>
                                            <option class="px-2 mx-4" value="5">5</option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">
                                            <path
                                                d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                        </svg>
                                    </div>
                                    <div class="col-span-2 items-center flex gap-10 relative"
                                        wire:model.live="children">
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                            Trẻ
                                            em
                                        </label>
                                        <select id="underline_select" wire:model="children"
                                            class="block py-2.5 px-2 w-1/2 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                            <option class="px-2 mx-4" selected value="1">1</option>
                                            <option class="px-2 mx-4" value="2">2</option>
                                            <option class="px-2 mx-4" value="3">3</option>
                                            <option class="px-2 mx-4" value="4">4</option>
                                            <option class="px-2 mx-4" value="5">5</option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">
                                            <path
                                                d="M580-490q-21 0-35.5-14.5T530-540q0-21 14.5-35.5T580-590q21 0 35.5 14.5T630-540q0 21-14.5 35.5T580-490Zm-200 0q-21 0-35.5-14.5T330-540q0-21 14.5-35.5T380-590q21 0 35.5 14.5T430-540q0 21-14.5 35.5T380-490Zm100 210q-60 0-108.5-33T300-400h360q-23 54-71.5 87T480-280Zm0 160q-75 0-140.5-28.5t-114-77q-48.5-48.5-77-114T120-480q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm0-80q116 0 198-82t82-198q0-116-82-198t-198-82h-12q-6 0-12 2-6 6-8 13t-2 15q0 21 14.5 35.5T496-680q9 0 16.5-3t15.5-3q12 0 20 9t8 21q0 23-21.5 29.5T496-620q-45 0-77.5-32.5T386-730v-6q0-3 1-8-83 30-135 101t-52 163q0 116 82 198t198 82Zm0-280Z" />
                                        </svg>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                                    <div class="md:grid grid-cols-5 md:flex-none overflow-hidden">
                                        <div class="col-span-2 md:max-h-[230px]">
                                            <!-- Hình ảnh cố định -->
                                            <img class="object-cover w-full rounded-t-lg md:rounded-tr-none md:rounded-tl-lg h-96 md:h-full"
                                                src="https://diemdenantoan.sgtiepthi.vn/wp-content/uploads/2022/11/SSNVB-Exterior-1.jpg"
                                                alt="Hình ảnh">
                                        </div>
                                        <div
                                            class="col-span-3 md:flex-auto md:min-h-full flex flex-col p-4 pt-2 leading-normal">
                                            <h5
                                                class="mb-2 text-2xl md:text-xl font-semibold tracking-tight text-gray-900">
                                                Phòng đơn
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

                                    <div>
                                        <div
                                            class="md:flex md:justify-between border-t-2 md:flex-none md:w-full md:m-auto md:min-h-full p-4 text-gray-900">


                                            <div>
                                                <div class="font-bold">
                                                    Standard Rate
                                                </div>
                                                <div class="flex gap-2 text-gray-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                        <path
                                                            d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 ... (SVG path continues)" />
                                                    </svg>

                                                    <p> 50% deposit required</p>
                                                </div>
                                                <a href="#" class="underline text-xs text-orange-400">More
                                                    info</a>
                                            </div>
                                            <div class="flex flex-col md:flex-row items-end text-gray-900">
                                                <div>
                                                    <p class="p-3 text-xs flex items-end flex-col"><span
                                                            class="text-xs font-bold">VND 1,747,200</span><br><span>Cost
                                                            for 1 night, 2 guests</span></p>
                                                </div>
                                                <div>
                                                    <!-- Số lượng phòng còn lại cố định -->
                                                    <p class="text-end p-3 text-green-500 font-bold text-xs">
                                                        Còn 3 phòng


                                                    </p>
                                                    <div>
                                                        <button
                                                            class="py-2 px-11 me-2 mb-2 text-sm font-semibold text-gray-900 focus:outline-none bg-orange-400 rounded-lg border hover:bg-orange-500 hover:shadow focus:z-10 focus:ring-4 focus:ring-orange-100">
                                                            Đặt ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col mb-5 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:min-w-full">
                                <div>
                                    <div class="md:grid grid-cols-5 md:flex-none overflow-hidden">
                                        <div class="col-span-2 md:max-h-[230px]">
                                            <!-- Hình ảnh cố định -->
                                            <img class="object-cover w-full rounded-t-lg md:rounded-tr-none md:rounded-tl-lg h-96 md:h-full"
                                                src="https://diemdenantoan.sgtiepthi.vn/wp-content/uploads/2022/11/SSNVB-Exterior-1.jpg"
                                                alt="Hình ảnh">
                                        </div>
                                        <div
                                            class="col-span-3 md:flex-auto md:min-h-full flex flex-col p-4 pt-2 leading-normal">
                                            <h5
                                                class="mb-2 text-2xl md:text-xl font-semibold tracking-tight text-gray-900">
                                                Phòng đơn
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

                                    <div>
                                        <div
                                            class="md:flex md:justify-between border-t-2 md:flex-none md:w-full md:m-auto md:min-h-full p-4 text-gray-900">
                                            <div>
                                                <div class="flex gap-2 text-gray-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                        <path
                                                            d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 ... (SVG path continues)" />
                                                    </svg>
                                                    <p>Yêu cầu đặt cọc 50%</p>
                                                </div>
                                                <a href="#" class="underline text-xs">Xem chi tiết</a>
                                            </div>
                                            <div class="flex flex-col md:flex-row items-end text-gray-900">
                                                <p class="p-3"><span>1,500,000 đ/đêm</span></p>
                                                <div class="">
                                                    <!-- Số lượng phòng còn lại cố định -->
                                                    <p class="text-end p-3 text-green-500 font-bold text-xs">
                                                        Còn 3 phòng
                                                    </p>
                                                    <div>
                                                        <button
                                                            class="py-2 px-11 me-2 mb-2 text-sm font-semibold text-gray-900 focus:outline-none bg-orange-400 rounded-lg border hover:bg-orange-500 hover:shadow focus:z-10 focus:ring-4 focus:ring-orange-100">
                                                            Đặt ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col mb-5 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:min-w-full">
                                <div>
                                    <div class="md:grid grid-cols-5 md:flex-none overflow-hidden">
                                        <div class="col-span-2 md:max-h-[230px]">
                                            <!-- Hình ảnh cố định -->
                                            <img class="object-cover w-full rounded-t-lg md:rounded-tr-none md:rounded-tl-lg h-96 md:h-full"
                                                src="https://diemdenantoan.sgtiepthi.vn/wp-content/uploads/2022/11/SSNVB-Exterior-1.jpg"
                                                alt="Hình ảnh">
                                        </div>
                                        <div
                                            class="col-span-3 md:flex-auto md:min-h-full flex flex-col p-4 pt-2 leading-normal">
                                            <h5
                                                class="mb-2 text-2xl md:text-xl font-semibold tracking-tight text-gray-900">
                                                Phòng đơn
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

                                    <div>
                                        <div
                                            class="md:flex md:justify-between border-t-2 md:flex-none md:w-full md:m-auto md:min-h-full p-4 text-gray-900">
                                            <div>
                                                <div class="flex gap-2 text-gray-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                        <path
                                                            d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 ... (SVG path continues)" />
                                                    </svg>
                                                    <p>Yêu cầu đặt cọc 50%</p>
                                                </div>
                                                <a href="#" class="underline text-xs">Xem chi tiết</a>
                                            </div>
                                            <div class="flex flex-col md:flex-row items-end text-gray-900">
                                                <p class="p-3"><span>1,500,000 đ/đêm</span></p>
                                                <div class="">
                                                    <!-- Số lượng phòng còn lại cố định -->
                                                    <p class="text-end p-3 text-green-500 font-bold text-xs">
                                                        Còn 3 phòng
                                                    </p>
                                                    <div>
                                                        <button
                                                            class="py-2 px-11 me-2 mb-2 text-sm font-semibold text-gray-900 focus:outline-none bg-orange-400 rounded-lg border hover:bg-orange-500 hover:shadow focus:z-10 focus:ring-4 focus:ring-orange-100">
                                                            Đặt ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product grid -->

                        <!-- ===== -->

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
                                                <p class="font-semibold text-black">Deluxe Double - Rooftop
                                                    RoomStandard
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
                                            <div
                                                class="w-full py-2 font-bold cursor-pointer text-gray-900 focus:outline-none bg-orange-400 rounded-lg border hover:bg-orange-500 hover:shadow focus:z-10 focus:ring-4 text-center">
                                                BOOK
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
        </div>
    </div>
</x-app-layout>
