<?php

use App\Http\Controllers\accController;
use App\Http\Controllers\dbController;
use App\Http\Controllers\navController;
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

Route::get('/', function () {
    return view('welcome');
});

// navController
Route::get('',[navController::class,'']);


// dbController



Route::post('/addProduk',[dbController::class,'addProduk']);


// accController



Route::post('/login',[accController::class,'login']);
Route::post('/register',[accController::class,'register']);
Route::post('/logout',[accController::class,'logout']);