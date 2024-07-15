<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use App\Models\TipoPessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoPessoa::create([ 'nome' => 'chefe']);
        TipoPessoa::create([ 'nome' => 'funcionario']);
    }
}
