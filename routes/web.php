<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TipoComidaController;
use App\Http\Controllers\ComidaController;

Route::resource('tipo_comidas', TipoComidaController::class);
Route::resource('comidas', ComidaController::class);