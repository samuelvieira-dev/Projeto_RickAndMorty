<?php

use App\Http\Controllers\RickAndMortyController;

Route::get('/', [RickAndMortyController::class, 'home'])->name('home');
Route::get('/personagens', [RickAndMortyController::class, 'characters'])->name('characters');
Route::get('/sobre', [RickAndMortyController::class, 'about'])->name('about');
Route::get('/login', [RickAndMortyController::class, 'login'])->name('login');
Route::get('/register', [RickAndMortyController::class, 'register'])->name('register');
