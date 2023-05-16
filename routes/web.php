<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ContactoController;


Route::get('/', [PessoaController::class, 'index']);
Route::resource("pessoa",PessoaController::class);
Route::resource("contacto",ContactoController::class);

Auth::routes();
