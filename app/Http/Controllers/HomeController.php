<?php

namespace App\Http\Controllers;
use App\Contato;
use App\Datas;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller{

    public function index(){


       return view('login');
   }

   public function logout(){
       Auth::logout();
       return redirect('/');
   }

   public function contato(Request $request){

        $contato = new Contato();
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->texto = $request->input('texto');
        $contato->save();

   }

   public function notfound(){
        return 'not found';
   }

   public function servererror(){
       return 'algo errado ocorreu';
   }

    public function home(){
        if(Auth::check()){
            return view('pages.dashboard')->with('usuario',Auth::user());
        }else{
            return redirect('/');
        }
   }


    public function efetuarLogin(Request $request){
        $erro = 'erro ao logar';
       try{
           $usuario = Usuario::where('email',$request->input('email'))->first();
           $senha = $request->input('senha');
           if(Hash::check($senha,$usuario->senha) && $usuario!= null){
              $usuario = Auth::loginUsingId($usuario->id);
               return redirect('/home')->with('usuario',$usuario);
           }else{
               return view('login')->with('erro',$erro);
           }
       }catch (Exception $e){
           $erro = $e->getMessage();
           return view('login')->with('erro',$erro);
       }
    }

}
