<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Datas;
use App\IdAleatorio;
use App\Usuario;
use App\UsuariosListas;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller{


    public function novo(){

        if(Auth::user() != null){
            $cursos = Curso::all();
            if ( count($cursos) == 0 ){
                return redirect('/curso')->with('error','É necessário cadastrar um curso para criar um usuário');
            }
            return view('pages.novo_usuario')->with('cursos',$cursos);
        }else{
            return redirect('/404');
        }

    }

    public function store(Request $request){//salvar usuario
        date_default_timezone_set('America/Fortaleza');
   
            $usuario = new Usuario();
            $usuario->id = IdAleatorio::gerar();
            $usuario->email = $request->input('email');
            $usuario->nome = $request->input('nome');
            $usuario->senha = bcrypt($request->input('senha'));
            $usuario->matricula = $request->input('matricula');
            $usuario->curso_id = $request->input('curso_id');
            $usuario->data_criacao = Datas::getDataAtual();
            $usuario->data_atualizado = Datas::getDataAtual();
            $usuario->save();
            try {
                return redirect('/novo_usuario')->with('success','Usuário salvo com sucesso!');
            } catch (\Exception $e) {
                return redirect('/novo_usuario')->with('error','Erro ao salvar usuário!')->withInput();
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

        $email = Usuario::where('email', $request->input('email'))->get();
        $usuario = Usuario::find($request->input('id'));

        if($usuario->email != $request->input('email') && count($email) > 0){
            return redirect('/edit/'.base64_encode($request->input('id')))->with('error','Email já cadastrado!');
        }

        $usuario->email = $request->input('email');
        $usuario->nome = $request->input('nome');
        $usuario->matricula = $request->input('matricula');
        $usuario->data_atualizado = Datas::getDataAtual();

        if($request->input('senha') == null){
            $usuario->senha = $usuario->senha;
        }else{
            $usuario->senha = bcrypt($request->input('senha'));
        }

        try {
            $usuario->save();
            return redirect('/edit/'.base64_encode($request->input('id')))->with('success','Usuário editado com sucesso!');
        } catch (\Exception $e) {
            return redirect('/edit/'.base64_encode($request->input('id')))->with('error','Erro ao atualizar usuário!');
        }
    

       
    }


    public function destroy($id){
        try {
           $usuario = Usuario::find($id);
           $usuario->delete();
           return redirect('/usuario')->with('success','Usuário excluído com sucesso!');
        } catch (\Exception $e) {
           return redirect('/usuario')->with('error','Erro ao excluir usuário!'.$e->getMessage());
        }
    }

    public function verificarEmail($email){
        try{
            $usuario = Usuario::where('email', $email)->get();
            if(count($usuario) > 0){
                return json_encode(true);
            }else{
                return json_encode(false);
            }
        }
        catch (\Exception $e){
            return json_encode(false);
        }

        

    }
}

