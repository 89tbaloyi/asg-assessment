<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Models\Currency;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $currencies = Currency::all();    
    return view('dashboard', compact('currencies'));
   
    
})->name('dashboard');
Route::get('/currency', [CurrencyController::class, 'index'])->name('currency');
Route::get('currency/edit/{id}', [CurrencyController::class, 'edit']);
Route::post('currency/update/{id}', [CurrencyController::class, 'update'])->name('currency-update');
Route::get('currency/delete/{id}', [CurrencyController::class, 'destroy']);
Route::post('/currency', [CurrencyController::class, 'store'])->name('currency-store');
