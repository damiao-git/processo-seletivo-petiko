<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $usuario = Auth::user();

        if ($usuario->tipoPessoa == 1) {
            $tarefas = Tarefa::all();
        } else {
            $tarefas = Tarefa::where('user_id', $usuario->id)->get();
        }

        return response()->json($tarefas);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|nullable|string',
                'pessoa_id' => 'required|exists:pessoas,id',
                'finalizada' => 'required|boolean',
            ]);
            $tarefa = Tarefa::create($request->all());
            return response()->json(['tarefa' => $tarefa], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao cadastrar a tarefa.', 'message' => $e->getMessage()], 500);
        }

    }

    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        return response()->json(['tarefa' => $tarefa], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|nullable|string',
                'pessoa_id' => 'required|exists:pessoas,id',
                'finalizada' => 'required|boolean',
            ]);

            $tarefa = Tarefa::findOrFail($id);
            $tarefa->update($request->all());
            return response()->json(['tarefa' => $tarefa], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar a tarefa.', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();
        return response()->json(['message' => 'Deletado', 'status' => 200]);
    }
}
