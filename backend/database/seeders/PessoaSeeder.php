<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pessoa::create([ 'nome' => 'Damião', 'tipo_pessoa_id' => 1]);
    }
}
