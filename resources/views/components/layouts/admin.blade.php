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
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/uld93l9ghco0r3u0fwzfp2flnt2ku1iv9n7qa3i0626ibgi2/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- MonthSelectPlugin --}}
    <script src="https://unpkg.com/flatpickr/dist/plugins/monthSelect/index.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <link href="https://unpkg.com/flatpickr/dist/plugins/monthSelect/style.css" rel="stylesheet">
    {{-- PhotoSwipe --}}
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-secondary">

    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-mary-button label="App" class="btn-ghost ml-5 pt-5" link="{{ route('home') }}" />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <x-mary-button label="App" class="btn-ghost" link="{{ route('home') }}" />

            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- User --}}
                @if ($user = auth()->user())
                    <x-mary-menu-separator />

                    <x-mary-list-item :item="$user" value="name" sub-value="email" avatar="avatar.url"
                        no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff"
                                no-wire-navigate link="{{ route('logout') }}" />
                        </x-slot:actions>
                    </x-mary-list-item>

                    <x-mary-menu-separator />
                @endif

                <x-mary-menu-item title="Dashboard" icon="o-chart-bar" link="{{ route('dashboard') }}" />
                <x-mary-menu-item title="Users" icon="o-user" link="{{ route('list-user') }}" />
                <x-mary-menu-item title="Room Types" icon="o-tag" link="{{ route('list-type-room') }}" />
                <x-mary-menu-item title="Rooms" icon="o-home-modern" link="{{ route('list-room') }}" />
                <x-mary-menu-item title="Booking" icon="o-shopping-cart" link="{{ route('list-booking') }}" />
                @php
                    $cout_message = App\Models\ContactMessage::all()->filter(fn($msg) => $msg->is_readed == 0)->count();

                @endphp
                <x-mary-menu-item title="Messages" icon="o-envelope" link="{{ route('list-contact-message') }}"
                    badge="{{ $cout_message > 0 ? $cout_message : '' }}" badge-classes="float-right bg-sky-400" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Banners" icon="o-banknotes" link="{{ route('banners') }}" />
                    <x-mary-menu-item title="About page" icon="o-information-circle"
                        link="{{ route('about-page-setting') }}" />
                    <x-mary-menu-item title="Policies" icon="c-shield-check" link="{{ route('list-policy') }}" />

                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
    @stack('scripts')
</body>

</html>
