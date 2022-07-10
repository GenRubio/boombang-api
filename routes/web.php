<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Home Routes
Route::prefix('home')->group(function () {
});

// Routes require auth
Route::middleware('auth')->group(function () {
});
