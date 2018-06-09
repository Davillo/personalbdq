<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Usuario;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller{


    public function novo(){
        $cursos = Curso::all();
        return view('pages.novo_usuario')->with('cursos',$cursos);
    }

    public function store(Request $request){
        date_default_timezone_set('America/Fortaleza');
        if($this->validate($request,[
           'email' => 'required',
            'nome' => 'required',
            'senha' => 'required',
            'matricula'=>'required',
            'curso_id' => 'required'
        ])){
            $usuario = new Usuario();
            $usuario->email = $request->input('email');
            $usuario->nome = $request->input('nome');
            $usuario->senha = bcrypt($request->input('senha'));
            $usuario->matricula = $request->input('matricula');
            $usuario->curso_id = $request->input('curso_id');
            $usuario->data_criacao = date('Y-m-d');
            $usuario->data_atualizado = date('Y-m-d');

            if($usuario->save()){
                return redirect('/usuario')->with('success','Salvo com sucesso!');
            }
        }



    }

    public function show(){
        $usuarios = Usuario::orderBy('id','desc')->get();
        return view('pages.usuarios')->with('usuarios',$usuarios);
    }

    public function edit($id){
        $usuario = Usuario::find($id);
        return view('pages.editar_usuario')->with('usuario',$usuario);
    }

    public function update(Request $request){
        date_default_timezone_set('America/Fortaleza');
        $this->validate($request,[
            'email' => 'required',
            'nome' => 'required',
            'matricula'=>'required',
            ]);

        $usuario = Usuario::find($request->input('id'));
        $usuario->email = $request->input('email');
        $usuario->nome = $request->input('nome');
        $usuario->matricula = $request->input('matricula');
        $usuario->data_atualizado = date('Y-m-d');

        if($request->input('senha') == null){
            $usuario->senha = $usuario->senha;
       }else{
            $usuario->senha = bcrypt($request->input('senha'));
        }
        //$usuario->curso_id = $request->input('');

        if($usuario->save()){
            return redirect('/usuario')->with('success','Editado com sucesso!');
        }
    }


    public function destroy($id){
        $usuario = Usuario::find($id);
        if($usuario->delete()){
            return redirect('/usuario')->with('success','Deletado com sucesso!');
        }
    }
}
