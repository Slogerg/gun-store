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


Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('gun',\App\Http\Controllers\Admin\GunController::class);
    Route::resource('category',\App\Http\Controllers\Admin\CategoryController::class);
});

Auth::routes();



Route::get('/guns',[\App\Http\Controllers\GunController::class,'index'])->name('guns');
Route::get('/guns/{id}',[\App\Http\Controllers\GunController::class,'single'])->name('gun.single');
Route::post('/addInBasket',[\App\Http\Controllers\GunController::class,'addInBasket'])->name('addInBasket');
Route::post('/addInLiked',[\App\Http\Controllers\GunController::class,'addInLiked'])->name('addInLiked');

Route::get('/basket',[\App\Http\Controllers\BasketController::class,'index'])->name('basket');
Route::get('/liked',[\App\Http\Controllers\LikedController::class,'index'])->name('liked');
Route::post('/reloadCount',[\App\Http\Controllers\BasketController::class,'reloadCount'])->name('reloadCount');
Route::delete('/basketItemRemove/{basket}',[\App\Http\Controllers\BasketController::class,'destroy'])->name('basketItemRemove.destroy');
Route::delete('/likedItemRemove/{liked}',[\App\Http\Controllers\LikedController::class,'destroy'])->name('likedItemRemove.destroy');
Route::delete('/commentRemove/{id}',[\App\Http\Controllers\CommentController::class,'destroy'])->name('commentRemove.destroy');

Route::post('/order',[\App\Http\Controllers\OrderController::class,'store'])->name('order.store');
Route::post('/comment',[\App\Http\Controllers\CommentController::class,'store'])->name('comment.store');

Route::get('/searchByName',[\App\Http\Controllers\GunController::class,'searchByName'])->name('searchByName');
Route::get('/sortByPrice',[\App\Http\Controllers\GunController::class,'sortByPrice'])->name('sortByPrice');
Route::get('/sortByDate',[\App\Http\Controllers\GunController::class,'sortByDate'])->name('sortByDate');
