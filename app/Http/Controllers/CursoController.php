<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function novo(){
        return view('pages.novo_curso');
    }

    public function show(){
        $cursos = Curso::orderBy('nome','asc')->get();
        return view('pages.cursos')->with('cursos',$cursos);
    }

    public function inserir(Request $request){
        date_default_timezone_set('America/Fortaleza');


        $this->validate($request, [
            'nome' => 'required',
            'tipo' => 'required'
        ]);

        $curso = new Curso();

        $curso->nome = $request->input('nome');
        $curso->tipo = $request->input('tipo');
        $curso->data_criacao = date('Y-m-d');
        $curso->data_atualizado = date('Y-m-d');

        if($curso->save()){
            return redirect('/curso')->with('success','Salvo com sucesso!');
        }

    }

    public function edit($id){
        $curso = Curso::find($id);
        return view('pages.editar_curso')->with('curso',$curso);
    }

    public function update(Request $request){

        $this->validate($request, ['nome' => 'required', 'tipo' => 'required']);

        $curso = Curso::find($request->input('id'));
        $curso->nome = $request->input('nome');
        $curso->tipo = $request->input('tipo');
        $curso->data_atualizado = date('Y-m-d');


        if($curso->save()){
            return redirect('/curso')->with('success','Editado com sucesso!');
        }
    }

    public function destroy($id){
        Curso::destroy($id);
        return redirect('/curso')->with('success','Excluído com sucesso!');
    }
}
