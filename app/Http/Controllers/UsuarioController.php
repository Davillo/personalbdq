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
        $usuario = Usuario::where('email', $request->input('email'))->get();
        if(count ($usuario ) > 0 ){
                return redirect('/usuario')->with('error','Email já cadastrado no banco de dados, utilize outro');
        }

        date_default_timezone_set('America/Fortaleza');
        if($this->validate($request,[
           'email' => 'required',
            'nome' => 'required',
            'senha' => 'required',
            'matricula'=>'required',
            'curso_id' => 'required'
        ])){

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

                return redirect('/usuario')->with('success','Salvo com sucesso!');
            } catch (\Exception $e) {
                return redirect('/usuario')->with('error','Erro ao salvar usuário!');
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
        $usuario = Usuario::where('email', $request->input('email'))->get();
        if(count ($usuario ) > 0 ){
            return redirect('/usuario')->with('error','Email já cadastrado no banco de dados, utilize outro');
        }
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
        
        try {
            $usuario->save();
            return redirect('/usuario')->with('success','Editado com sucesso!');
        } catch (\Exception $e) {
            return redirect('/usuario')->with('error','Erro ao atualizar usuário!'); 
        }
       
    }


    public function destroy($id){
        try {
           $usuario = Usuario::find($id);
           return redirect('/usuario')->with('success','Deletado com sucesso!');
        } catch (\Exception $e) {
           return redirect('/usuario')->with('error','Erro ao deletar usuário!');
        }
    }

    public function verificarEmail($email){
        $usuario = Usuario::where('email', $email)->get();
        
        if(count($usuario) > 0){
            return json_encode(true);
        }else{            
            return json_encode(false);
        }
    }
}
