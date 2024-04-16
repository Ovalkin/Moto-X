<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
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

Route::get('/setting', [UserController::class, 'setting'])->name('setting');
Route::post('/setting/changepass', [UserController::class, 'changePass']);
Route::post('/setting/changedata', [UserController::class, 'changeData']);

Route::post('/signup', [UserController::class, 'signUp']);
Route::post('/signin', [UserController::class, 'signIn']);
Route::get('/signout', [UserController::class, 'signOut']);

Route::get('/adminpanel/{page?}', [AdminController::class, 'index']);
Route::post('/adminpanel/add-motorcycles/submit', [AdminController::class, 'addMotorcycle']);
Route::post('/adminpanel/add-product/submit', [AdminController::class, 'addProduct']);
Route::post('/adminpanel/add-equipment/submit', [AdminController::class, 'addEquipment']);
Route::post('/adminpanel/add-accessory/submit', [AdminController::class, 'addAccessory']);
Route::post('/adminpanel/edit-product/edit', [AdminController::class, 'selectProduct']);
Route::post('/adminpanel/edit-product/edit/submit', [AdminController::class, 'editProduct']);

Route::get('/basket', [BasketController::class, 'index']);
Route::get('/basket/update', [BasketController::class, 'update']);
Route::post('/basket/delete', [BasketController::class, 'delete']);
Route::post('/basket/addProduct', [BasketController::class, 'addProduct']);

Route::get('/{page?}', [UserController::class, "index"])->name('mainPage');
Route::get('/{page?}/{code?}', [UserController::class, 'index']);
