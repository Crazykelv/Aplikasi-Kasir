<?php

use App\Http\Controllers\accController;
use App\Http\Controllers\dashboardHandler;
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
Route::get('/',[navController::class,'login']);
Route::get('/dashboard',[navController::class,'dashboard']);
Route::get('/nAddProduk',[navController::class,'nAddProduk']);




// dbController



Route::post('/addProduk',[dbController::class,'addProduk']);



// accController
Route::get('/logout',[accController::class,'logout']);
Route::post('/login',[accController::class,'login']);


Route::post('/register',[accController::class,'register']);



// dashboardHandler
Route::get('/filterMale',[dashboardHandler::class,'filterMale']);
Route::get('/filterFemale',[dashboardHandler::class,'filterFemale']);
Route::get('/filterSetelan',[dashboardHandler::class,'filterSetelan']);
Route::get('/filterCelana',[dashboardHandler::class,'filterCelana']);
Route::get('/filterBaju',[dashboardHandler::class,'filterBaju']);
// Route::get('/tambah/{$produkid}',[dashboardHandler::class,'tambah']);