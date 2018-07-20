<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'nota_1',
        'nota_2',
        'nota_3',
        'aluno_id',
        'disciplina_id'
    ];


    public function disciplina(){
        return $this->belongsTo('App\Disciplina' );
    }
    public function aluno(){
        return $this->belongsTo('App\Aluno' );
    }
}
