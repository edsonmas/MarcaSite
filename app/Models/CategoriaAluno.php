<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaAluno extends Model
{   
    protected $fillable = ['nome_categoria'];

    public function users(){
        return $this->hasMany(User::class,'user_id','id');
    }
}
