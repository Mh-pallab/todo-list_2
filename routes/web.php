<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
   return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user'])->group(function () {
   Route::resource('/post', PostController::class);
   Route::post('/task-update-status/{id}', [PostController::class, 'update_status'])->name('task.update_status');
});

Route::middleware(['auth', 'admin'])->group(function () {
   Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
   Route::DELETE('/dashboard/{user}', [AdminController::class, 'destroy'])->name('destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
