<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Datas;
use App\Usuario;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller{


    public function novo(){
        $cursos = Curso::all();
        if (count($cursos) == 0){
            return redirect('/curso')->with('error','É necessário cadastrar um curso para criar um usuário');
        }
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
            $usuario->data_criacao = Datas::getDataAtual();
            $usuario->data_atualizado = Datas::getDataAtual();

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
        try{
            $usuario = Usuario::findOrFail(base64_decode($id));
            return view('pages.editar_usuario')->with('usuario',$usuario);
        }catch (\Exception $e){
            return view('pages.error404');
        }
    }

    public function update(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'nome' => 'required',
            'matricula'=>'required',
            ]);

        $usuario = Usuario::find($request->input('id'));
        $usuario->email = $request->input('email');
        $usuario->nome = $request->input('nome');
        $usuario->matricula = $request->input('matricula');
        $usuario->data_atualizado = Datas::getDataAtual();

        if($request->input('senha') == null){
            $usuario->senha = $usuario->senha;
       }else{
            $usuario->senha = bcrypt($request->input('senha'));
        }

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
