<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/redirect', [HomeController::class, 'redirect']);
//Admin catagory
Route::get('/view_catagory', [AdminController::class, 'view_catagory']);
Route::post('/add_catagory', [AdminController::class, 'add_catagory']);
Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);
//Admin product
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

//home page
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
//add cart
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
//show cart
Route::get('/show_cart', [HomeController::class, 'show_cart']);
//remove_cart
Route::get('/remove_cart', [HomeController::class, 'remove_cart']);