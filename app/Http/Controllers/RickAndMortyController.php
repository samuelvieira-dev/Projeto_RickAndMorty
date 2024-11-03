<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RickAndMortyController extends Controller
{
    public function home() {
        return view('home');
    }

    public function characters() {
        return view('characters');
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
}
