<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarefa::create([ 'titulo' => 'Descansar né?', 'descricao' => 'Preciso mesmo! Muito mesmo!', 'pessoa_id' => 1, 'finalizada' => 1]);
    }
}
