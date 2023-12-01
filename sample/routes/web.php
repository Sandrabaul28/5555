<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\DashboardController;

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
    return redirect('/login');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function(){
	Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::prefix('books')->middleware(['auth'])->group(function(){
	Route::get('/', [App\Http\Controllers\Admin\BooksController::class, 'index'])->name('books.index');
	Route::get('/create', [App\Http\Controllers\Admin\BooksController::class, 'create'])->name('books.create');
	Route::post('/store', [App\Http\Controllers\Admin\BooksController::class, 'store'])->name('books.store');
    Route::get('/view/{id}', [App\Http\Controllers\Admin\BooksController::class, 'view'])->name('books.view');
});

Route::prefix('files')->middleware(['auth'])->group(function(){
	Route::get('/allfiles', [App\Http\Controllers\Admin\FilesController::class, 'allfiles'])->name('files.allfiles');
});