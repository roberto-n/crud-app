<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoStoreRequest;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\Request;


class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
   
    public function store(AlunoStoreRequest $request)
    {

        $aluno=Aluno::create($request->all());
        $id_curso=Curso::where('titulo',$request->get('titulo'))->get();
        $aluno->matriculas()->attach($id_curso);
       
        return ['msg'=>'aluno criado com sucesso'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($aluno)

    {   
       $matriculas=Aluno::where('nome',$aluno)->first();
       foreach ($matriculas->matriculas as $matricula) {
            $matricula->titulo;
        };
        $user=Aluno::where('nome',$aluno)->get();
        if(isset($matricula)){
        $pegauser=collect($user[0]);
        $pegauser->all();
        $pegamatricula=$pegauser->put('titulo',$matricula->titulo);
        $pegamatricula->all();
        $user=(array)$pegamatricula;}
        return $user;
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showemail($email)

    {   
     
        $matriculas=Aluno::where('email',$email)->first();
       
        foreach ($matriculas->matriculas as $matricula) {
            $matricula->titulo;
        };
        $user=Aluno::where('email',$email)->get();
        if(isset($matricula)){
        $pegauser=collect($user[0]);
        $pegauser->all();
        $pegamatricula=$pegauser->put('titulo',$matricula->titulo);
        $pegamatricula->all();
        $user=(array)$pegamatricula;
        
        }
        return $user;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     
    public function update(Request $request, Aluno $aluno)
    {
        $aluno->update($request->all());
        if(null!==($request->get('titulo'))){
        $id_curso=Curso::where('titulo',$request->get('titulo'))->get();
        $aluno->matriculas()->attach($id_curso);}
        return $aluno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        
        $aluno->matriculas()->detach();
        $aluno->delete();
        return['msg'=>'aluno deletado com sucesso'];
    }
}
