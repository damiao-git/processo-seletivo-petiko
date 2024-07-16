<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = Auth::user();
        $pessoa = Pessoa::where('user_id', $usuario->id)->first();
        $tarefas = Tarefa::where('pessoa_id', $pessoa->id)->get();
        return view('home', compact('usuario', 'pessoa', 'tarefas'));
    }
}
