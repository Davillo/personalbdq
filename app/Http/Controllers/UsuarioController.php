<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller{



    public function store(Request $request){
        $usuario = new Usuario();
        $usuario->email = $request->input('email');
        $usuario->nome = $request->input('nome');
        $usuario->senha = bcrypt($request->input('senha'));
        $usuario->matricula = $request->input('matricula');
        //$usuario->curso_id = $request->input('');
        if($usuario->save()){
            return redirect('/usuario')->with('success','Salvo com sucesso!');
        }

    }

    public function show(){
        $usuarios = Usuario::orderBy('id','asc')->get();
        return view('pages.usuarios')->with('usuarios',$usuarios)->with('usuario',Auth::user());
    }

    public function edit($id){
        $usuario = Usuario::find($id);
        return view('modals.editar_usuario')->with('usuario',$usuario);
    }

    public function update(Request $request){
        $usuario = find($request->input('id'));
        $usuario->email = $request->input('email');
        $usuario->nome = $request->input('nome');
        $usuario->senha = bcrypt($request->input('senha'));
        $usuario->matricula = $request->input('matricula');
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
