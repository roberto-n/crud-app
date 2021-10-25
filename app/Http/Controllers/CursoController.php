<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Http\Requests\CursoStoreRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    
    public function store(CursoStoreRequest $request)
    {
        
        $aluno=Curso::create($request->all());
        return ['msg'=>'curso criado com sucesso'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($curso)
    {
        
        $user=Curso::where('titulo',$curso)->get();
         return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, Curso $curso)
    {
        $curso->update($request->all());
        return $curso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return['msg'=>'aluno deletado com sucesso'];
    }
}
