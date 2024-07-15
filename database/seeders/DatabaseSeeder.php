<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TipoPessoaSeeder::class);
        $this->call(PessoaSeeder::class);
        $this->call(TarefaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
