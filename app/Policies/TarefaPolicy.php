<?php


namespace App\Policies;

use App\Models\Pessoa;
use App\Models\Tarefa;
use Illuminate\Auth\Access\HandlesAuthorization;

class TarefaPolicy
{
    use HandlesAuthorization;

    public function viewAny(Pessoa $pessoa)
    {
        return true;
    }

    public function view(Pessoa $pessoa, Tarefa $tarefa)
    {
        return $pessoa->id === $tarefa->pessoa_id;
    }

    public function create(Pessoa $pessoa)
    {
        return $pessoa->tipoPessoa == 1;
    }

    public function update(Pessoa $pessoa, Tarefa $tarefa)
    {
        return $pessoa->id === $tarefa->pessoa_id;
    }

    public function delete(Pessoa $pessoa, Tarefa $tarefa)
    {
        return $tarefa->tipoPessoa == 1;
    }
}

