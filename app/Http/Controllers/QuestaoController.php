<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\Questao;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestaoController extends Controller
{
    public function nova(){
        return view('pages.nova_questao');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $questao = new Questao();


        $questao->enunciado = $request->input('enunciado');
        $questao->palavaras_chave = $request->input('palavras_chave');
        $questao->categoria = $request->input('categoria');
        $questao->tipo = $request->input('tipo');
        $questao->dificuldade = $request->input('dificuldade');
        $questao->autor_usuario_id = Auth::user()->id;
        $questao->save();

        if($request->input('categoria') == 'objetiva'){
            $ultimoId = $questao->id;

            if($request->input('alternativa1') != null){
                $alternativa1 = new Alternativa();
                $alternativa1->questao_id = $ultimoId;
                $alternativa1->enunciado = $request->input('enunciado_alternativa1');
                $alternativa1->save();
            }

            if($request->input('alternativa2') != null){
                $alternativa2 = new Alternativa();
                $alternativa2->questao_id = $ultimoId;
                $alternativa2->enunciado = $request->input('enunciado_alternativa2');
                $alternativa2->save();
            }

            if($request->input('alternativa3') != null){
                $alternativa3 = new Alternativa();
                $alternativa3->questao_id = $ultimoId;
                $alternativa3->enunciado = $request->input('enunciado_alternativa3');
                $alternativa3->save();
            }

            if($request->input('alternativa4') != null){
                $alternativa4 = new Alternativa();
                $alternativa4->questao_id = $ultimoId;
                $alternativa4->enunciado = $request->input('enunciado_alternativa4');
                $alternativa4->save();
            }

            if($request->input('alternativa5') != null){
                $alternativa5 = new Alternativa();
                $alternativa5->questao_id = $ultimoId;
                $alternativa5->enunciado = $request->input('enunciado_alternativa5');
                $alternativa5->save();
            }
        }
    }

    public function show()
    {
        $questoes = Questao::where('autor_usuario_id',Auth::user()->id)->get();
        return view('pages.questoes')->with('questoes',$questoes);
    }

    public function edit(Questao $questao){
        //
    }

    public function update(Request $request, Questao $questao){
        //
    }

    public function destroy(Questao $questao)
    {
        //
    }
}
