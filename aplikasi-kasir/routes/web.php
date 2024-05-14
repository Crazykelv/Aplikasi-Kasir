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


// navController
Route::get('/',[navController::class,'home']);
Route::get('',[navController::class,'']);
Route::get('',[navController::class,'']);
Route::get('',[navController::class,'']);



// dbController
Route::get('',[dbController::class,'']);


Route::post('/addProduk',[dbController::class,'addProduk']);


// accController
Route::get('',[accController::class,'']);


Route::post('/login',[accController::class,'login']);
Route::post('/register',[accController::class,'register']);
Route::post('/logout',[accController::class,'logout']);