<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Função para cadastro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Cria o usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }


    // Função para logout
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function login(Request $request){

        // Validação de login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login bem-sucedido
            return redirect()->intended('/')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function authenticate(Request $request){

        // Validação dos dados de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentativa de autenticação
        if (Auth::attempt($credentials)) {
            // Redireciona para a página inicial com uma mensagem de sucesso
            return redirect()->route('home')->with('success', 'Login realizado com sucesso!');
        }

        // Se falhar, redireciona de volta com uma mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais informadas não correspondem.',
        ])->onlyInput('email');
    }
}
