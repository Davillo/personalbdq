<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class HomeController extends Controller
{
   public function index(){

     //  $usuario = Usuario::where('email','admin@admin.com')->first();
    //   if(Hash::check('admin',$usuario->senha)){
       //    if(  Auth::loginUsingId($usuario->id)){
     //          return redirect('/teste');
     //      }
//       }
       echo 'index';

   }


    public function login(){
       return view('login');
    }


    public function efetuarLogin(Request $request){

      $usuario = Usuario::where('email',$request->input('email'))->first();
      $senha = $request->input('senha');
      if(Hash::check($senha,$usuario->senha) && $usuario!= null){
          echo 'okay';
      }else{
        echo  'invalido';
      }


    }

}
