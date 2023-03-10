<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/users', [AdminController::class, 'user']);
Route::get('/deletefoodmenu/{id}', [AdminController::class, 'deletefoodmenu']);
Route::get('/editfoodmenu/{id}', [AdminController::class, 'editfoodmenu']);
Route::post('/updatefoodmenu/{id}', [AdminController::class, 'updatefoodmenu']);

Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
Route::post('/uploadfood', [AdminController::class, 'upload']);
Route::get('/delete-user/{id}', [AdminController::class, 'delete']);


Route::get('/redirects', [HomeController::class, 'redirects']);

Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/viewreservation', [AdminController::class, 'viewreservation']);

Route::get('/chefs', [AdminController::class, 'viewchefs']);
Route::post('/uploadchef', [AdminController::class, 'uploadchef']);
Route::get('/editchef/{id}', [AdminController::class, 'editchef']);
Route::post('/updatechef/{id}', [AdminController::class, 'updatechef']);
Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);


Route::post('/addcart/{id}', [HomeController::class, 'addcart']);
Route::get('/emptyshowcart', [HomeController::class, 'emptyshowcart']);
Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
Route::get('/remove/{id}', [HomeController::class, 'remove']);

// Order
Route::post('/orderconfirm', [HomeController::class, 'orderconfirm']);


// Admin Order
Route::get('/orders', [AdminController::class, 'orders']);

// Search
Route::get('/search', [AdminController::class, 'search']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
