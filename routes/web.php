<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ArticleController::class,'index'])
        ->name('dashboard');

    Route::post('/articles', [ArticleController::class,'store'])
        ->name('articles.store');

    Route::put('/articles/{article}', [ArticleController::class,'update'])
        ->name('articles.update');

    Route::delete('/articles/{article}', [ArticleController::class,'destroy'])
        ->name('articles.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';
