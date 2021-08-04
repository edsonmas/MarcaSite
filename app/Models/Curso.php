<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'nome_curso', 'descricao_curso', 'valor_curso','data_inicio_inscricao','data_fim_inscricao','qnt_max_inscritos','path_arquivo','user_id'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
