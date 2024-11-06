<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Character;

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

    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
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
        $character = Character::firstOrCreate([
            'url' => $request->url,
        ], [
            'name' => $request->name,
            'species' => $request->species,
            'image' => $request->image,
        ]);

        return redirect()->route('characters.show', $character->id);
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
