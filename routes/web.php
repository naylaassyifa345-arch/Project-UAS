<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\StockLogController;




Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');


     // user management
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::get('/admin/users/create', [UserController::class, 'create']);
    Route::post('/admin/users', [UserController::class, 'store']);
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit']);
    Route::put('/admin/users/{id}', [UserController::class, 'update']);
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);

     // category management
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories', [CategoryController::class, 'store']);
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy']);

     // menu management
    Route::get('/admin/menus', [MenuController::class, 'index']);
    Route::get('/admin/menus/create', [MenuController::class, 'create']);
    Route::post('/admin/menus', [MenuController::class, 'store']);
    Route::get('/admin/menus/{id}/edit', [MenuController::class, 'edit']);
    Route::put('/admin/menus/{id}', [MenuController::class, 'update']);
    Route::delete('/admin/menus/{id}', [MenuController::class, 'destroy']);

     // transaction management
    Route::get('/admin/transactions', [TransactionController::class, 'index']);
    Route::get('/admin/transactions/create', [TransactionController::class, 'create']);
    Route::post('/admin/transactions', [TransactionController::class, 'store']);

     // stock log
    Route::get('/admin/stock-logs', [StockLogController::class, 'index']);
    Route::get('/admin/stock-logs/create', [StockLogController::class, 'create']);
    Route::post('/admin/stock-logs', [StockLogController::class, 'store']);





});


// redirect root ke login
Route::get('/', function () {
    return redirect('/login');
});

// login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


