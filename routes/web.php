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

    // Route for showing the edit page
    Route::get('/shopping-list/{id}/edit', [ShoppingListController::class, 'editItem'])->name('shopping-list.editItem');

    // Route to handle the update request
    Route::patch('/shopping-list/{id}/update', [ShoppingListController::class, 'updateItem'])->name('shopping-list.updateItem');


    Route::delete('/shopping-list/{id}/delete', [ShoppingListController::class, 'deleteItem'])->name('shopping-list.deleteItem'); // Add name here

    // Route to handle the create request
    Route::post('/shopping-list/create', [ShoppingListController::class, 'createItem'])->name('shopping-list.createItem');
});

require __DIR__.'/auth.php';
