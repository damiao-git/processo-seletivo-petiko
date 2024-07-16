<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;


Route::apiResource('tarefas', TarefaController::class)->middleware('can:viewAny, App\Models\Tarefa');


