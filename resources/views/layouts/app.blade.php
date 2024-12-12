<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="garden">

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

<body class="font-sans antialiased relative">
    <div class="navbar bg-base-100 shadow-md sticky top-0 z-10">
        <div class="navbar-start">
            KhachSan2k
        </div>
        <div class="navbar-center hidden lg:flex">
            <x-mary-menu activate-by-route class="flex-row">
                <x-mary-menu-item title="Home" link="{{ route('home') }}" />
                <x-mary-menu-item title="About" link="{{ route('about') }}" />
                <x-mary-menu-item title="Contact" link="{{ route('contact') }}" />
                <x-mary-menu-item title="Policies" link="{{ route('policies') }}" />
            </x-mary-menu>
        </div>
        <div class="navbar-end flex-none gap-2">
            <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
            </div>
            <div class="dropdown dropdown-end">
                @if (Auth::check())
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img
                                src="
                                @isset(Auth::user()->avatar)
                                    {{ Auth::user()->avatar->url }}
                                @endisset
                                " />
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                        <li>
                            <a class="justify-between" href="{{ route('profile') }}">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="justify-between" href="{{ route('booking-history') }}">
                                Booking history
                            </a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                @else
                    <x-mary-button label="Login" link="{{ route('login') }}" class="btn-ghost btn-sm" responsive />
                    <x-mary-button label="Register" link="{{ route('register') }}" class="btn-ghost btn-sm"
                        responsive />
                @endif
            </div>
        </div>
    </div>
    <x-mary-main with-nav full-width>
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{--  TOAST area --}}
    <x-mary-toast />
    @livewire('layout/customer/footer')
    </div>
</body>

</html>
