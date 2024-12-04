<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'livewire.pages.customer.home')->name("home");

// route About
Route::view('about', 'livewire.pages.customer.about')
    ->name('about');
// route contact
Route::view('contact', 'livewire.pages.customer.contact')
    ->name('contact');
// route contact
Route::view('policies', 'livewire.pages.customer.policies')
    ->name('policies');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
