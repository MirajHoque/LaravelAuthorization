<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::resource('user', UserController::class);
Route::resource('post', PostController::class);
Route::resource('role', RoleController::class);
Route::get('role-delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
// Route::get('user-delete/{id}', [UserController::class, 'delete'])->name('user.delete');

