<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Data Tables

// Route::get('/datatables', function () {
//     return view('datatables');
// });

// User Management

Route::get('/all-user', [App\Http\Controllers\UserController::class, 'index'])->name('alluser');
Route::get('/add-user', [App\Http\Controllers\UserController::class, 'create'])->name('adduser');
Route::post('insert-user', [App\Http\Controllers\UserController::class, 'store'])->name('insertuser');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edituser');
Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateuser');
Route::delete('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteuser');

Route::get('/all-mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('allmahasiswa');
Route::get('/add-mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'create'])->name('addmahasiswa');
Route::post('insert-mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'store'])->name('insertmahasiswa');
Route::get('/edit-mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'edit'])->name('editmahasiswa');
Route::put('/update-mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'update'])->name('updatemahasiswa');
Route::delete('/delete-mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])->name('deletemahasiswa');


//Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class, 'UpdateUser'])->name('updateuser');
