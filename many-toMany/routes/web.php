<?php

use App\Http\Controllers\categorieController;
use App\Http\Controllers\livreController;
use Illuminate\Support\Facades\Route;

Route::get('/', categorieController::class . '@index')->name('catégorie.index');
Route::get('/catégories/create', categorieController::class . '@create')->name('catégorie.create');
Route::post('/catégories', categorieController::class . '@store')->name('catégorie.store');
Route::get('/categories/{catégorie}/edit', categorieController::class . '@edit')->name('catégorie.edit');
Route::put('catégories/{catégorie}',categorieController::class . '@update')->name('catégorie.update');
Route::delete('catégories/{catégorie}',categorieController::class . '@destroy')->name('catégorie.destroy');


Route::get('/livres',livreController::class . '@index')->name('livres.index');
Route::get('/livres/create',livreController::class . '@create')->name('livres.create');
Route::post('/livres',livreController::class . '@store')->name('livres.store');
Route::get('/livres/{livre}/edit',livreController::class . '@edit')->name('livres.edit');
Route::put('/livres/{livre}',livreController::class . '@update')->name('livres.update');
Route::delete('/livres/{livre}',livreController::class . '@destroy')->name('livres.destroy');
