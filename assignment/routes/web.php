<?php

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

Route::get('/', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::get('/getEmpcode', [App\Http\Controllers\RegisterController::class, 'create'])->name('getEmpcode');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('employee.register');
Route::get('/getData', [App\Http\Controllers\RegisterController::class, 'show'])->name('employee.data');
Route::post('/filter', [App\Http\Controllers\RegisterController::class, 'filterData'])->name('employee.filter');