<?php

use Illuminate\Support\Facades\Route; // A ferramenta principal de rotas do Laravel
use App\Http\Controllers\ClienteController; // O "cérebro" que gere Clientes
use App\Http\Controllers\AnimalController; // O "cérebro" que gere Animais
use App\Http\Controllers\ServicoController; // O "cérebro" que gere Serviços






 //Esta é a rota para a página principal do site
Route::get('/', function () {
    return view('welcome');
});


// Essa Ela cria automaticamente TODAS as 7 rotas necessárias para um CRUD completo de Clientes.
 //Ela "mapeia" automaticamente cada URL para uma função 
Route::resource('clientes', ClienteController::class);
Route::resource('animais', AnimalController::class);
Route::resource('servicos', ServicoController::class);
