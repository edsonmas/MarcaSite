<?php

use App\Models\CategoriaAluno;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Estudante','Profissional','Associado'] as $name) {
            CategoriaAluno::create([
                'nome_categoria' => $name
            ]);
        }
    }
}
