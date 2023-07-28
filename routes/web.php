<?php

use App\Enums\Role;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Middleware\EnsureUserHasRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function() {

    Route::prefix('dashboard')->name('dashboard')->group(function () {
        Route::view('/', 'dashboard');

        Route::prefix('users')->name('.users.')->group(function () {
            Route::get('/', Users\IndexController::class)->name('index');
        });
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/{user}/profile', 'edit')->name('profile.edit');
        Route::patch('/{user}/profile', 'update')->name('profile.update');
        Route::delete('/{user}/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
