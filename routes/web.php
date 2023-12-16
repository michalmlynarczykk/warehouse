<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingPageController::class, 'landingPage'])->name('landingPage');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    //Routes available to admin
    Route::middleware(['role:ADMIN'])->group(function () {
        Route::get('/admin/items', [ItemController::class, 'adminAll'])->name('items.admin_all');
        Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('/items/create', [ItemController::class, 'createPost'])->name('items.create.post');
    });

    //Routes available to user
    Route::middleware(['role:USER'])->group(function () {
        Route::post('/order', [OrderController::class, 'createOrder'])->name('order.create');
        Route::get('/items', [ItemController::class, 'all'])->name('items.all');
    });

    //Routes available to User and Admin
    Route::middleware(['role:USER|ADMIN'])->group(function () {
        Route::get('/items', [ItemController::class, 'all'])->name('items.all');
    });
});

