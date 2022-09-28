<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // COMANDA
    Route::get('/comanda', function () {
        return view('comanda');
    })->name('comanda');
    
    // PRODUTOS
    Route::get('/produtos', [ProductController::class, 'index'])->name('produtos');
    Route::post('/produtos', [ProductController::class, 'store']);
    Route::post('/produtos/{product}', [ProductController::class, 'update']);
    Route::delete('/produtos/{product}', [ProductController::class, 'destroy']);

    // MESAS
    Route::get('/mesas', [TableController::class, 'index'])->name('produtos');
    Route::post('/mesas', [TableController::class, 'store']);
    Route::post('/mesas/{table}', [TableController::class, 'update']);
    Route::delete('/mesas/{table}', [TableController::class, 'destroy']);

    // COZINHA
    Route::get('/cozinha', function () {
        return view('cozinha');
    })->name('cozinha');
});
