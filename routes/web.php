<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ReaderController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::resource('/books', BookController::class);

Route::resource('/readers', ReaderController::class)->except('show');

Route::resource('/libraries', LibraryController::class);
