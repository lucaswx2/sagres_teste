<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
     protected $fillable = [
        'matricula', 'nome', 'endereco', 'bairro', 'cep', 'cidade', 'uf', 'email', 'preco', 'data_entrada'
    ];

    public function disciplinas(){
        return $this->hasMany('App\Disciplina', 'disciplina_id');
    }
    public function notas(){
        return $this->hasMany('App\Disciplina', 'disciplina_id');
    }

}
