<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="mytheme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased relative bg-secondary">
    <div class=" shadow-md sticky top-0 z-50 bg-primary">
        <div class="lg:max-w-6xl px-6 mx-auto navbar text-lg py-0">
            <div class="navbar-start">
                KhachSan2k
            </div>
            <div class="navbar-center hidden lg:flex">
                <x-mary-menu activate-by-route class="flex-row py-0">
                    <x-mary-menu-item
                        class="rounded-none text-lg hover:border-b-2 hover:border-black {{ request()->routeIs('home') ? 'border-b-2 border-black' : '' }}"
                        title="Home" link="{{ route('home') }}" />
                    <x-mary-menu-item
                        class="rounded-none text-lg hover:border-b-2 hover:border-black {{ request()->routeIs('about') ? 'border-b-2 border-black' : '' }}"
                        title="About" link="{{ route('about') }}" />
                    <x-mary-menu-item
                        class="rounded-none text-lg hover:border-b-2 hover:border-black {{ request()->routeIs('contact') ? 'border-b-2 border-black' : '' }}"
                        title="Contact" link="{{ route('contact') }}" />
                    <x-mary-menu-item
                        class="rounded-none text-lg hover:border-b-2 hover:border-black {{ request()->routeIs('policies') ? 'border-b-2 border-black' : '' }}"
                        title="Policies" link="{{ route('policies') }}" />
                </x-mary-menu>
            </div>
            <div class="navbar-end flex-none gap-2">
                <!-- <div class="form-control">
                    <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
                </div> -->
                <div class="dropdown dropdown-end">
                    @if (Auth::check())
                        <div class="flex items-center gap-5">
                            <span class="text-sm">{{ Auth::user()->name }}</span>
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-10 rounded-full">
                                    <img
                                        src="
                                    {{ Auth::user()->avatar->url ?? Vite::asset('resources/images/user_default.png') }}
                                    " />
                                </div>
                            </div>
                        </div>
                        <ul tabindex="0"
                            class="menu dropdown-content bg-base-100 rounded-box z-[1] mt-4 w-52 p-2 shadow">
                            <li>
                                <a class="hover:underline" href="{{ route('profile') }}">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="hover:underline" href="{{ route('booking-history') }}">
                                    Booking history
                                </a>
                            </li>
                            @if (Auth::user()->role == 'admin')
                                <li><a class="hover:underline" href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                            <li><a class="hover:underline" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    @else
                        <x-mary-button label="Login" link="{{ route('login') }}" class="btn-ghost btn-sm"
                            responsive />
                        <x-mary-button label="Register" link="{{ route('register') }}" class="btn-ghost btn-sm"
                            responsive />
                    @endif
                </div>

            </div>
        </div>
    </div>
    <x-mary-main with-nav full-width>
        <x-slot:content class="!py-0 !p-0 relative">
            {{ $slot }}
        </x-slot:content>
        <div class="fixed bottom-0 right-0 mb-4 mr-4">
            <button id="open-chat"
                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Chat with Admin Bot
            </button>
        </div>
        <div id="chat-container" class="hidden fixed bottom-16 right-4 w-96">
            <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
                <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                    <p class="text-lg font-semibold">Admin Bot</p>
                    <button id="close-chat"
                        class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="chatbox" class="p-4 h-80 overflow-y-auto">
                    <!-- Chat messages will be displayed here -->
                    <div class="mb-2 text-right">
                        <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">hello</p>
                    </div>
                    <div class="mb-2">
                        <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from
                            the chatbot.</p>
                    </div>
                    <div class="mb-2 text-right">
                        <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">this example of chat</p>
                    </div>
                    <div class="mb-2">
                        <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from
                            the chatbot.</p>
                    </div>
                    <div class="mb-2 text-right">
                        <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">design with tailwind</p>
                    </div>
                    <div class="mb-2">
                        <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from
                            the chatbot.</p>
                    </div>
                </div>
                <div class="p-4 border-t flex">
                    <input id="user-input" type="text" placeholder="Type a message"
                        class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button id="send-button"
                        class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Send</button>
                </div>
            </div>
        </div>
    </x-mary-main>

    {{-- TOAST area --}}
    <x-mary-toast />
    @livewire('layout/customer/footer')
    </div>
</body>

</html>
