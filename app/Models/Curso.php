<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'titulo',
        'descrição'
    ];
    public function matriculas(){

        return $this->belongsToMany(Aluno::class,'matriculas','curso_id','aluno_id');
    }
}
