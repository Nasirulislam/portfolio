<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Livewire\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/change_password', ChangePassword::class)->name('change_password');

    Route::resource('indexes', IndexController::class);
});

Auth::routes();
