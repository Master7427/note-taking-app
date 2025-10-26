<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategorieController;

Route::resource('/notes', NoteController::class);
Route::post('/autocomplete', [NoteController::class,'autocomplete'])->name('autocomplete');
Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
Route::get('/categories/{id}', [CategorieController::class, 'show']);

//Route::resource('categories', CategorieController::class);


Route::get('/', [NoteController::class, 'index']); // ✅ correction ici
Route::get('/apropos', function () {
    return view('apropos');
});