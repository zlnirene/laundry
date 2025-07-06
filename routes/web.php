<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/transaction_item', [App\Http\Controllers\TransactionItemController::class, 'index'])->name('transaction_item.index');
Route::get('/transaction_item/create', [App\Http\Controllers\TransactionItemController::class, 'create'])->name('transaction_item.create');
Route::post('/transaction_item', [App\Http\Controllers\TransactionItemController::class, 'update'])->name('transaction_item.store');
Route::get('/transaction_item/{id}/edit', [App\Http\Controllers\TransactionItemController::class, 'edit'])->name('transaction_item.edit');
Route::put('/transaction_item/{id}', [App\Http\Controllers\TransactionItemController::class, 'update'])->name('transaction_item.update');
Route::delete('/transaction_item/{id}', [App\Http\Controllers\TransactionItemController::class, 'destroy'])->name('transaction_item.destroy');

Route::resource('/transaction', App\Http\Controllers\TransactionController::class);
Route::post('/transaction/search', [App\Http\Controllers\TransactionController::class, 'search'])->name('search');
Route::get('/transaction/export/pdf', [App\Http\Controllers\TransactionController::class, 'export_pdf'])->name('transaction.export_pdf');
Route::get('transaction/export/excel', [App\Http\Controllers\TransactionController::class, 'export_excel'])->name('transaction.export_excel');

Route::resource('/item', App\Http\Controllers\ItemController::class);
Route::post('/item/search', [App\Http\Controllers\ItemController::class, 'search'])->name('search');
