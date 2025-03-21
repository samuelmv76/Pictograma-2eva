<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PictogramaController;
use App\Http\Controllers\AgendaController;

Route::get('/pictogramas', [PictogramaController::class, 'index']);
Route::get('/agenda/create', [AgendaController::class, 'create']);
Route::post('/agenda/store', [AgendaController::class, 'store']);
Route::get('/agenda/show', [AgendaController::class, 'showForm']);
Route::post('/agenda/show', [AgendaController::class, 'showAgenda']);