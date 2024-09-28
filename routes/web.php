<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Shopping list routes
    Route::get('/shopping-list', [ShoppingListController::class, 'showList'])->name('shopping-list');
    Route::get('/shopping-list/{$id}/edit', [ShoppingListController::class, 'editItem'])->name('shopping-list.editItem');
    Route::get('/shopping-list/{$id}/delete', [ShoppingListController::class, 'deleteItem'])->name('shopping-list.deleteItem');
});

require __DIR__.'/auth.php';
