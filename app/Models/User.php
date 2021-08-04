<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cpf','unidade_federativa','empresa','telefone','celular','curso_id','categoria_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categoria(){
        return $this->belongsTo(CategoriaAluno::class,'categoria_id','id');
    }

    public function cursos(){
        return $this->hasMany(Curso::class,'curso_id','id');
    }

    public function inscricoes(){
        return $this->hasMany(InscricaoAluno::class,'inscricao_alunos_id','id');
    }
}
