<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Character;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RickAndMortyController extends Controller
{
    public function home() {
        return view('home');
    }

    // public function characters() {
    //     return view('characters');
    // }
    public function characters() {
        // Buscar personagens salvos no banco de dados
        $characters = Character::all(); // Obtém todos os personagens salvos
        
        // Retorna a view 'characters' com os personagens salvos
        // return view('characters', compact('characters'));
        return view('character.saved', compact('characters'));
    }
    

    public function about() {
        return view('about');
    }

    public function register() {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function getCharacters() {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        return $response->json();
    }

    public function show($id) {
        $response = Http::get("https://rickandmortyapi.com/api/character/{$id}");
        $character = $response->json();
    
        $savedCharacter = Character::where('url', $character['url'])->first();
    
        return view('character.show', compact('character', 'savedCharacter'));
    }

    
    public function store(Request $request){

        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Por favor, faça login para salvar um personagem.');
        }

        // Caso o usuário esteja logado, cria ou encontra o personagem
        $character = Character::firstOrCreate([
            'url' => $request->url,
        ], [
            'name' => $request->name,
            'species' => $request->species,
            'image' => $request->image,
        ]);

        // Redireciona para a página de detalhes do personagem salvo
        return redirect()->route('characters.show', $character->id);
    }

    public function storeUser(Request $request){

        // Validação dos dados do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do novo usuário
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Criptografar a senha
        ]);

        // Autenticar o usuário após o cadastro (opcional)
        Auth::login($user);

        // Redireciona para a página desejada após o cadastro
        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function deleteCharacter($id) {
        $character = Character::findOrFail($id);
        $character->delete();
    
        return redirect()->route('character.index');
    }

    public function edit($id) {
        $character = Character::findOrFail($id);
        return view('character.edit', compact('character'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'image' => 'nullable|url',
        ]);

        $character = Character::findOrFail($id);
        $character->update($validated);

        return redirect()->route('character.show', $character->id)
                         ->with('success', 'Personagem atualizado com sucesso!');
    }

    public function index() {
        $characters = Character::all();
        return view('character.index', compact('characters'));
    }

    public function destroy($id) {
        $character = Character::findOrFail($id);
        $character->delete();
    
        return redirect()->route('character.index')->with('success', 'Personagem excluído com sucesso!');
    }

    
}
