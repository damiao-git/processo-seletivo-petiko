<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }
    public function index()
    {
        return Tarefa::all();
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
        try{
            $request->validate([
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|nullable|string',
                'pessoa_id' => 'required|exists:pessoas,id',
                'finalizada' => 'required|boolean',
            ]);

            $tarefa = Tarefa::findOrFail($id);
            $tarefa->update($request->all());
            return response()->json(['tarefa' => $tarefa], 200);
        }
        catch (\Exception $e) {
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
