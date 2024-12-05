<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Livewire\Pages\Admin\AddRoom;
use App\Livewire\Pages\Admin\AddRoomType;
use App\Livewire\Pages\Admin\Banners;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\ListBooking;
use App\Livewire\Pages\Admin\ListRoom;
use App\Livewire\Pages\Admin\ListTypeRoom;
use App\Livewire\Pages\Admin\ListUser;
use App\Livewire\Pages\Admin\UpdateRoom;
use App\Livewire\Pages\Admin\UpdateRoomType;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});

Route::middleware(["auth", IsAdminMiddleware::class])->group(function () {
    Route::get("admin/dashboard", Dashboard::class)->name("dashboard");
    Volt::route("admin/list-user", ListUser::class)->name("list-user");
    Volt::route("admin/list-type-room", ListTypeRoom::class)->name("list-type-room");
    Volt::route("admin/add-room-type", AddRoomType::class)->name("add-room-type");
    Volt::route("admin/update-room-type/{id}", UpdateRoomType::class)->name("update-room-type");
    Volt::route("admin/list-room", ListRoom::class)->name("list-room");
    Volt::route("admin/add-room", AddRoom::class)->name("add-room");
    Volt::route("admin/update-room/{id}", UpdateRoom::class)->name("update-room");
    Volt::route("admin/list-booking", ListBooking::class)->name("list-booking");
    Volt::route("admin/banners", Banners::class)->name("banners");
});