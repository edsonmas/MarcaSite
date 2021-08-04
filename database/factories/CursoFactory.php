<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'nome_curso'=> $faker->unique()->word,
        'descricao_curso'=>$faker->sentence(),
        'valor_curso'=>$faker->randomNumber(2),
        'data_inicio_inscricao'=>now(),
        'data_fim_inscricao'=>now(),
        'qnt_max_inscritos'=>$faker->randomNumber(),
        'path_arquivo'=>null,
        'user_id'=>1
    ];
});
