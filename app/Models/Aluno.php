<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\Models\Matricula;

class Aluno extends Model
{
    use HasFactory;
    

    protected $fillable =[
        'nome',
        'email',
        'data_de_nacimento'
    ];

    public function matriculas(){

        return $this->belongsToMany(Curso::class,'matriculas','aluno_id','curso_id');
    }
}
