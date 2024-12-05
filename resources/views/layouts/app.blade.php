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

<body class="font-sans antialiased">
    <x-mary-nav sticky full-width>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <div>App</div>
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            @if (Auth::check())
                <x-mary-dropdown label="{{ Auth::user()->name }}">
                    <x-mary-menu-item title="Profile" link="{{ route('profile') }}" />
                    <x-mary-menu-item title="Dashboard" link="{{ route('dashboard') }}" />
                </x-mary-dropdown>
            @else
                <x-mary-button label="Login" link="{{ route('login') }}" class="btn-ghost btn-sm" responsive />
                <x-mary-button label="Register" link="{{ route('register') }}" class="btn-ghost btn-sm" responsive />
            @endif
        </x-slot:actions>
    </x-mary-nav>
    <x-mary-main with-nav full-width>
        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}

        {{-- The `$slot` goes here --}}
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
