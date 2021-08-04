<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        User::create([
            'name'=> 'Edson Matheus',
            'email'=> 'testeadmin@teste.com',
            'password'=>bcrypt('123456'),
            'categoria_id'=> 1,
            'cpf'=>"055.223.427-67",
            'unidade_federativa'=>'DF',
            'empresa'=>null,
            'telefone'=>'(61)33345-6704',
            'celular'=>'(61)9 9584-2938',
        ]);
    }
}
