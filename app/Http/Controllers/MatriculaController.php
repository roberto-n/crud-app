<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Matricula;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {   
        $request->validate([
            'titulo'=>'required',
            'aluno'=>'required'

       ]);
        $nomes=explode(',',($request->get('aluno')));
        $titulos=explode(',',($request->get('titulo')));
         foreach ($titulos as $titulo){
          foreach ($nomes as $nome){
           $aluno=Aluno::where('nome',$nome)->first();
           $id_curso=Curso::where('titulo',$titulo)->get();
           $aluno->matriculas()->attach($id_curso);}}
        return ['msg'=>'aluno criado com sucesso'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($matricula)
    {   
        $user=Curso::where('titulo',$matricula)->get();
        $matriculas=Curso::where('titulo',$matricula)->first();
        $arraynomealuno=array();
        $test3=$matriculas->matriculas;
        foreach ($test3 as $nomes) {
            $nome=$nomes->nome;
            $arraynomealuno[]=$nome;
        };
        $pegauser=collect($user[0]);
        $pegauser->all();
        $peganmealuno=$pegauser->put('aluno',$arraynomealuno);
        $peganmealuno->all();
        $matriculaformatada=(array)$peganmealuno;
        return $matriculaformatada;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {    
        
        $titulo=$request->get('titulo');
        $nomes=explode(',',($request->get('aluno')));
        foreach ($nomes as $nome){
            $aluno=Aluno::where('nome',$nome)->first();
            $id=$aluno->id;
            $arrayid[]=$id;
           };
        $curso=Curso::where('titulo',$titulo)->first();
        $curso->matriculas()->sync($arrayid);
        return $curso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($matricula)
    {
        
        $matriculas=Curso::where('id',$matricula)->first();
        $matriculas->matriculas()->detach();
        $matriculas->delete();
        return ['msg'=>'matriculas deletado com sucesso'];
    }
}
