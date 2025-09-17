<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'email' => 'required|email|max:255|unique:users',
        ]);

        // Criar o usuário no banco de dados
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
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

    /**
     * Exibe a tela inicial com botões de login e cadastro
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Exibe o formulário de login
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Processa o login do usuário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            // Tentar autenticação com tratamento de erro específico
            try {
                $authResult = Auth::attempt($credentials);
                
                if ($authResult) {
                    $request->session()->regenerate();
                    
                    return response()->json([
                        'success' => true,
                        'message' => 'Login realizado com sucesso!',
                        'redirect' => '/editar'
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Credenciais inválidas!'
                ]);
            } catch (\Exception $authException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erro na autenticação: ' . $authException->getMessage(),
                    'file' => $authException->getFile(),
                    'line' => $authException->getLine()
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                 'success' => false,
                 'message' => 'Erro interno: ' . $e->getMessage(),
                 'file' => $e->getFile(),
                 'line' => $e->getLine()
             ], 500);
         }
     }

    /**
     * Exibe o formulário de edição do usuário
     *
     * @return \Illuminate\View\View
     */
    public function showEditForm()
    {
        return view('user.edit', ['user' => Auth::user()]);
    }

    /**
     * Atualiza os dados do usuário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Dados atualizados com sucesso!'
        ]);
    }

    /**
     * Faz logout do usuário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home');
    }
}