<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/create', [App\Http\Controllers\TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction', [App\Http\Controllers\TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction/{id}/edit', [App\Http\Controllers\TransactionController::class, 'edit'])->name('transaction.edit');
Route::post('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'update'])->name('transaction.update');
Route::delete('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'destroy'])->name('transaction.destroy');

Route::get('/transaction_item', [App\Http\Controllers\TransactionItemController::class, 'index'])->name('transaction_item.index');
Route::get('/transaction_item/create', [App\Http\Controllers\TransactionItemController::class, 'create'])->name('transaction_item.crate');
Route::post('/transaction_item', [App\Http\Controllers\TransactionItemController::class, 'update'])->name('transaction_item.store');
Route::get('/transaction_item/{id}/edit', [App\Http\Controllers\TransactionItemController::class, 'edit'])->name('transaction_item.edit');
Route::post('/transaction_item/{id}', [App\Http\Controllers\TransactionItemController::class, 'update'])->name('transaction_item.update');
Route::delete('/transaction_item/{id}', [App\Http\Controllers\TransactionItemController::class, 'destroy'])->name('transaction_item.destroy');

Route::get('/item', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
Route::post('/item',[App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
Route::get('/item/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
Route::post('/item/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
Route::delete('/item/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');