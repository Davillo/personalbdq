<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function novo(){
        return view('modals.novo_curso');
    }

    public function show(){
        $cursos = Curso::all();
        return view('pages.cursos')->with('cursos',$cursos);
    }

    public function inserir(Request $request){
        $curso = new Curso();
        $curso->nome = $request->input('nome');
        $curso->tipo = $request->input('tipo');

        if($curso->save()){
            return redirect('/curso')->with('success','Salvo com sucesso!');
        }

    }

    public function edit($id){
        $curso = Curso::find($id);
        return view('modals.novo_curso')->with('curso',$curso);
    }

    public function destroy($id){
        Curso::destroy($id);
        return redirect('/curso')->with('success','Excluído com sucesso!');
    }
}
