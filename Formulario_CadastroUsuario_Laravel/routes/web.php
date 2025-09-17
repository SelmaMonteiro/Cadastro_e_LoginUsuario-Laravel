<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rota para tela inicial
Route::get('/', [UserController::class, 'home'])->name('home');

// Rotas de autenticação
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rotas de cadastro
Route::get('/cadastro', [UserController::class, 'showRegistrationForm'])->name('user.register.form');
Route::post('/cadastro', [UserController::class, 'register'])->name('user.register');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/editar', [UserController::class, 'showEditForm'])->name('user.edit');
    Route::post('/editar', [UserController::class, 'update'])->name('user.update');
});