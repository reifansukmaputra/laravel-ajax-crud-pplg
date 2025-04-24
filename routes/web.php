<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('beranda', ['title' => 'Beranda']);
});

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/get_data', [ItemController::class, 'getData']);
Route::get('/items/{idItem}', [ItemController::class, 'getDataById']);
Route::post('/items/form', [ItemController::class, 'storeData']);
Route::put('/items/form/{idItem}', [ItemController::class, 'updateData']);
Route::delete('/items/form/{idItem}', [ItemController::class, 'destroyData']);
