<?php

use App\Http\Controllers\RickAndMortyController;

Route::get('/', [RickAndMortyController::class, 'home'])->name('home');

Route::get('/personagens', [RickAndMortyController::class, 'characters'])->name('characters');

Route::get('/sobre', [RickAndMortyController::class, 'about'])->name('about');

// Rota para exibir o formulário de login (método GET)
Route::get('/login', [RickAndMortyController::class, 'login'])->name('login');

// Rota para processar o login do usuário (método POST)
Route::post('/login', [RickAndMortyController::class, 'authenticate'])->name('login.authenticate');

// Rota para logout
Route::post('/logout', [RickAndMortyController::class, 'logout'])->name('logout');

// Rota para exibir o formulário de cadastro
Route::get('/cadastro', [RickAndMortyController::class, 'register'])->name('register');

// Rota para processar o cadastro do usuário (método POST)
Route::post('/cadastro', [RickAndMortyController::class, 'storeUser'])->name('register.store');

// Rota para exibir todos os personagens
Route::get('/characters', [RickAndMortyController::class, 'index'])
    ->middleware('auth') // Protege a rota de personagens
    ->name('character.index');

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
