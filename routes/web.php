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



Route::resource('gun',\App\Http\Controllers\Admin\GunController::class);
Route::resource('category',\App\Http\Controllers\Admin\CategoryController::class);

Auth::routes();



Route::get('/guns',[\App\Http\Controllers\GunController::class,'index'])->name('guns');
