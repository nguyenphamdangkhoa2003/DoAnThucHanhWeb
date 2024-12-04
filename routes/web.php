<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// route Home
Route::view('home', 'livewire.pages.customer.home')
    ->name('home');

// route About
Route::view('about', 'livewire.pages.customer.about')
    ->name('about');
// route contact
Route::view('contact', 'livewire.pages.customer.contact')
    ->name('contact');
// route contact
Route::view('policies', 'livewire.pages.customer.policies')
    ->name('policies');
// route booking-info
Route::view('booking-info', 'livewire.pages.customer.booking-info')
    ->name('booking-info');




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
