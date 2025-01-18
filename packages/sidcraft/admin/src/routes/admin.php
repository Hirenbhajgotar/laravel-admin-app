<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\UserController;
use Sidcraft\Admin\Controllers\UserController;

Route::prefix('admin')->name('admin.')->middleware(['web'])->group(function () {
    Route::resource('users', UserController::class);
});
