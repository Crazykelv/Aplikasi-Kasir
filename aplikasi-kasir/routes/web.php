<?php

use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dbController;
use App\Http\Controllers\accController;
use App\Http\Controllers\navController;
use App\Http\Controllers\dashboardHandler;
use App\Http\Controllers\FPGrowthController;

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
Route::get('/dashboardMember/{id}',[navController::class,'dashboardMember']);
Route::get('/nAddProduk',[navController::class,'nAddProduk']);
Route::get('/member',[navController::class,'member']);
Route::get('/addMember',[navController::class,'addMember']);
Route::get('/history-transaksi',[navController::class,'history']);
Route::get('/dashGrowth',[navController::class,'dashGrowth']);






// dbController
Route::get('/addIncrement/{id}',[dbController::class,'addIncrement']);
Route::get('/minIncrement/{id}',[dbController::class,'minIncrement']);
Route::get('/addTransaksi/{id}',[dbController::class,'addTransaksi']);
Route::get('/delHist/{id}',[dbController::class,'delHist']);


Route::post('/addProduk',[dbController::class,'addProduk']);
Route::post('/addcart/{id}', [dbController::class, 'addcart']);


// accController
Route::get('/delMember/{id}',[accController::class,'delMember']);
Route::get('/updateDiscUp/{id}',[accController::class,'updateDiscUp']);
Route::get('/updateDiscDown/{id}',[accController::class,'updateDiscDown']);
Route::get('/logout',[accController::class,'logout']);



Route::post('/login',[accController::class,'login']);
Route::post('/addMemberData',[accController::class,'addMemberData']);


Route::post('/register',[accController::class,'register']);



// dashboardHandler
Route::get('/filterMale',[dashboardHandler::class,'filterMale']);
Route::get('/filterFemale',[dashboardHandler::class,'filterFemale']);
Route::get('/filterSetelan',[dashboardHandler::class,'filterSetelan']);
Route::get('/filterCelana',[dashboardHandler::class,'filterCelana']);
Route::get('/filterBaju',[dashboardHandler::class,'filterBaju']);
Route::get('/cancel',[dashboardHandler::class,'cancel']);
// Route::get('/tambah/{$produkid}',[dashboardHandler::class,'tambah']);





