<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Data Tables

// Route::get('/datatables', function () {
//     return view('datatables');
// });

// User Management

Route::get('/all-user', [App\Http\Controllers\UserController::class, 'AllUser'])->name('alluser');
Route::get('/add-user', [App\Http\Controllers\UserController::class, 'AddUser'])->name('adduser');
Route::post('insert-user', [App\Http\Controllers\UserController::class, 'InsertUser'])->name('insertuser');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'EditUser'])->name('edituser');
Route::post('/update-user/{id}', [App\Http\Controllers\UserController::class, 'UpdateUser'])->name('updateuser');
Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'DeleteUser'])->name('deleteuser');
