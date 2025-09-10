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

// Rota para exibir o formulário de cadastro
Route::get('/', [UserController::class, 'showRegistrationForm'])->name('user.register.form');
Route::get('/cadastro', [UserController::class, 'showRegistrationForm'])->name('user.register.form.alt');

// Rota para processar o cadastro
Route::post('/cadastro', [UserController::class, 'register'])->name('user.register');