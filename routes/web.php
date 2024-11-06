<?php

use App\Http\Controllers\RickAndMortyController;

Route::get('/', [RickAndMortyController::class, 'home'])->name('home');
Route::get('/personagens', [RickAndMortyController::class, 'characters'])->name('characters');
Route::get('/sobre', [RickAndMortyController::class, 'about'])->name('about');
Route::get('/login', [RickAndMortyController::class, 'login'])->name('login');
Route::get('/register', [RickAndMortyController::class, 'register'])->name('register');

// Rota para exibir todos os personagens
Route::get('/characters', [RickAndMortyController::class, 'index'])->name('character.index');

// Rota para exibir o personagem individual
// Route::get('/characters/{id}', [RickAndMortyController::class, 'show'])->name('character.show');
Route::get('/characters/{id}', [RickAndMortyController::class, 'show'])->name('characters.show');

// Rota para salvar o personagem no banco de dados
Route::post('/characters', [RickAndMortyController::class, 'store'])->name('character.save');

// Rota para exibir o formulário de edição do personagem
Route::get('/characters/{id}/edit', [RickAndMortyController::class, 'edit'])->name('character.edit');

// Rota para atualizar as informações do personagem
Route::put('/characters/{id}', [RickAndMortyController::class, 'update'])->name('characters.update');

// Rota para excluir o personagem
Route::delete('/characters/{id}', [RickAndMortyController::class, 'destroy'])->name('character.delete');
