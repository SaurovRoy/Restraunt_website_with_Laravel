<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/redirects',[HomeController::class,'redirects'])->name('redirects');
Route::post('/addcart/{id}',[HomeController::class,'addcart'])->name('addcart');
Route::get('/showcart/{id}',[HomeController::class,'showcart'])->name('showcart');
Route::get('/remove/{id}',[HomeController::class,'remove'])->name('remove');
Route::post('/orderconfirm',[HomeController::class,'orderconfirm'])->name('orderconfirm');
Route::get('/adminusers',[UserController::class,'users'])->name('adminusers');
Route::get('/deleteuser/{id}',[UserController::class,'deleteuser'])->name('deleteuser');
Route::get('/foodmenu',[FoodController::class,'foodmenu'])->name('foodmenu');
Route::post('/uploadfood',[FoodController::class,'uploadfood'])->name('uploadfood');
Route::get('/deletefood/{id}',[FoodController::class,'deletefood'])->name('deletefood');
Route::get('/updatefood/{id}',[FoodController::class,'updatefood'])->name('updatefood');
Route::post('/updatefoodmenu/{id}',[FoodController::class,'updatefoodmenu'])->name('updatefoodmenu');
Route::post('/reservation',[UserController::class,'reservation'])->name('reservation');
Route::get('/reservationshow',[UserController::class,'reservationshow'])->name('reservationshow');
Route::get('/chefshow',[UserController::class,'chefshow'])->name('chefshow');
Route::post('/uploadchef',[UserController::class,'uploadchef'])->name('uploadchef');
Route::get('/deletechef/{id}',[UserController::class,'deletechef'])->name('deletechef');
Route::get('chefhomeshow',[UserController::class,'chefhomeshow'])->name('chefhomeshow');
Route::get('/updatechef/{id}',[UserController::class,'updatechef'])->name('updatechef');
Route::post('/updatechefinfo/{id}',[UserController::class,'updatechefinfo'])->name('updatechefinfo');
Route::get('/order',[UserController::class,'order'])->name('order');
Route::get('/search',[UserController::class,'search'])->name('search');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
