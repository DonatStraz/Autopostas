<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DropDownController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
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
Route::get('/', [CarController::class,'main'])->name('index');

Route::get('/profilis', [UserController::class,'index'])->name('dashboard.index')->middleware('auth');
Route::put('/profilis/edit', [UserController::class, 'update'])->name('update.user')->middleware('auth');

Route::get('/atsiliepimai', [ReviewController::class,'index'])->name('reviews.index');
Route::get('/atsiliepimai/{id}/{car_id}', [ReviewController::class,'show'])->name('reviews.show');
Route::get('/rasyti-atsiliepima/{id}', [ReviewController::class,'create'])->name('reviews.create');
Route::post('/reviews/create', [ReviewController::class, 'store'])->name('store.review');
Route::get('/redaguoti-atsiliepima/{id}/{car_id}', [ReviewController::class, 'edit'])->name('edit.review');
Route::get('/review-delete/{id}', [ReviewController::class, 'destroy'])->name('delete.review')->middleware('auth');
Route::put('/review-edit/{id}', [ReviewController::class, 'update'])->name('update.review');

Route::get('/straipsniai', function () {
    return view('articles.index');
})->name('articles');

Route::post('api/fetch-models', [DropDownController::class, 'fetchModels']);
Route::post('api/fetch-generations', [DropDownController::class, 'fetchGenerations']);
Route::get('/automobiliai', [CarController::class, 'index'])->name('cars.index');
Route::get('/automobiliai/{id}', [CarController::class,'show'])->name('cars.show');

require __DIR__.'/auth.php';
