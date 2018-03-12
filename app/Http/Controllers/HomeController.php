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


    public function login()
    {
        /*
         $usuario = Usuario::create(array(
             'nome' => 'admin',
             'admin'=> true,
             'email'=> 'admin@admin.com',
             'senha'=>bcrypt('admin')
         ));
       */

        return view('login');
    }



    public function efetuarLogin(Request $request){

        $erro = 'erro ao logar';
       try{
           $usuario = Usuario::where('email',$request->input('email'))->first();
           $senha = $request->input('senha');
           if(Hash::check($senha,$usuario->senha) && $usuario!= null){
              return 'okay';
           }else{

              return view('login')->with('erro',$erro);
           }
       }catch (\Exception $e){

           $erro = $e->getMessage();
           return view('login')->with('erro',$erro);

       }



    }

}
