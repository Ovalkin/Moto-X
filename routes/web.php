<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|   @vite(['resources/sass/app.scss', 'resources/js/app.js'])
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, "index"])->name('/');
Route::get('/motorcycles', [UserController::class, 'index'])->name('motorcycles');
Route::get('/equipment', [UserController::class, 'index'])->name('equipment');
Route::get('/accessories', [UserController::class, 'index'])->name('accessories');
Route::get('/discounted', [UserController::class, 'index'])->name('discounted');
Route::get('/setting', [UserController::class, 'setting'])->name('setting');

Route::post('/signup', [UserController::class, 'signUp']);
Route::post('/signin', [UserController::class, 'signIn']);
Route::get('/signout', [UserController::class, 'signOut']);
