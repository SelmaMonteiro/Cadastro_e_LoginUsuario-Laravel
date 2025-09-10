<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Exibe o formulário de cadastro de usuário
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('user.register');
    }

    /**
     * Processa os dados do formulário de cadastro
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'email' => 'required|email|max:255',
        ]);

        // Retorna os dados em formato JSON para exibir no alert
        return response()->json([
            'success' => true,
            'message' => 'Cadastro realizado com sucesso!',
            'data' => [
                'nome' => $validatedData['first_name'],
                'sobrenome' => $validatedData['last_name'],
                'usuario' => $validatedData['username'],
                'email' => $validatedData['email']
            ]
        ]);
    }
}