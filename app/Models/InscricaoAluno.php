<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscricaoAluno extends Model
{
    protected $fillable = [
        'status','user_id','curso_id','valor_incricao'
    ];

    public function aluno(){
       return $this->belongsTo(User::class,'user_id','id');
    }

    public function curso(){
       return $this->belongsTo(Curso::class,'curso_id','id');
    }
}
