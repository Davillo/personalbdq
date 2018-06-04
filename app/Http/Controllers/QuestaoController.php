<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\Questao;
use App\QuestaoListas;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestaoController extends Controller
{
    public function nova($id){
        return view('pages.nova_questao')->with("lista_id",$id);
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

        $this->validate($request,[
           'enunciado' => 'required',
           'palavras_chave' => 'required',
           'dificuldade' => 'required',
            'tipo' => 'required',
            'categoria' => 'required'
        ]);


        $questao->enunciado = $request->input('enunciado');
        $questao->palavras_chave = $request->input('palavras_chave');
        $questao->categoria = $request->input('categoria');
        $questao->tipo = $request->input('tipo');
        $questao->dificuldade = $request->input('dificuldade');
        $questao->autor_usuario_id = Auth::user()->id;
        $questao->save();

        $ultimoIdQeustao = $questao->id;

        if($request->input('tipo') == 'Múltipla Escolha'){

            if($request->input('enunciado_alternativa1') != null){
                $alternativa1 = new Alternativa();
                $alternativa1->questao_id = $ultimoIdQeustao;
                $alternativa1->enunciado = $request->input('enunciado_alternativa1');
                if($request->input('correta') == '1'){
                    $alternativa1->correta = true;
                }else{
                    $alternativa1->correta = false;
                }
                $alternativa1->save();
            }

            if($request->input('enunciado_alternativa2') != null){
                $alternativa2 = new Alternativa();
                $alternativa2->questao_id = $ultimoIdQeustao;
                $alternativa2->enunciado = $request->input('enunciado_alternativa2');
                if($request->input('correta') == '2'){
                    $alternativa2->correta = true;
                }else{
                    $alternativa2->correta = false;
                }
                $alternativa2->save();
            }

            if($request->input('enunciado_alternativa3') != null){
                $alternativa3 = new Alternativa();
                $alternativa3->questao_id = $ultimoIdQeustao;
                $alternativa3->enunciado = $request->input('enunciado_alternativa3');
                if($request->input('correta') == '3'){
                    $alternativa3->correta = true;
                }else{
                    $alternativa3->correta = false;
                }
                $alternativa3->save();
            }

            if($request->input('enunciado_alternativa4') != null){
                $alternativa4 = new Alternativa();
                $alternativa4->questao_id = $ultimoIdQeustao;
                $alternativa4->enunciado = $request->input('enunciado_alternativa4');
                if($request->input('correta') == '4'){
                    $alternativa4->correta = true;
                }else{
                    $alternativa4->correta = false;
                }
                $alternativa4->save();
            }

            if($request->input('enunciado_alternativa5') != null){
                $alternativa5 = new Alternativa();
                $alternativa5->questao_id = $ultimoIdQeustao;
                $alternativa5->enunciado = $request->input('enunciado_alternativa5');
                if($request->input('correta') == '5'){
                    $alternativa5->correta = true;
                }else{
                    $alternativa5->correta = false;
                }
                $alternativa5->save();
            }
        }

        $questaoListas = new QuestaoListas();
        $questaoListas->questao_id = $ultimoIdQeustao;
        $questaoListas->lista_id = $request->input('lista_id');
        $questaoListas->save();

        return redirect('/lista/'.$questaoListas->lista_id)->with('success','Questão criada com sucesso!');

    }

    public function show()
    {
        $questoes = Questao::where('autor_usuario_id',Auth::user()->id)->get();
        $alternativas = Alternativa::whereIn('questao_id',$questoes->id)->get();

        return view('pages.questoes')->with('questoes',$questoes)->with('alternativas',$alternativas);
    }

    public function edit($id,$lista_id)
    {
        $questao = Questao::find($id);
        $alternativas = Alternativa::where('questao_id',$id)->get();
        return view('pages.editar_questao')->with('questao',$questao)->with('alternativas',$alternativas)->with('lista_id',$lista_id);

    }

    public function update(Request $request){


        $this->validate($request,[
            'enunciado' => 'required',
            'palavras_chave' => 'required',
            'dificuldade' => 'required',
            'categoria' => 'required'
        ]);

        $questao = Questao::find($request->input('id'));
        $questao->enunciado = $request->input('enunciado');
        $questao->palavras_chave = $request->input('palavras_chave');
        $questao->categoria = $request->input('categoria');
        $questao->dificuldade = $request->input('dificuldade');
        $questao->autor_usuario_id = Auth::user()->id;
        $questao->save();

        $ultimoIdQuestao = $questao->id;

        $alternativas = Alternativa::where('questao_id',$ultimoIdQuestao)->get();

        if($questao->tipo == "Múltipla Escolha" || $questao->tipo == "Asserção Razão" || $questao->tipo == "Verdadeiro ou Falto"){

            if($request->input('enunciado_alternativa1') != null){
                $alternativa1 = Alternativa::find($alternativas[0]->id);
                $alternativa1->questao_id = $ultimoIdQuestao;
                $alternativa1->enunciado = $request->input('enunciado_alternativa1');
                if($request->input('correta') == '1'){
                    $alternativa1->correta = true;
                }else{
                    $alternativa1->correta = false;
                }
                $alternativa1->save();
            }

            if($request->input('enunciado_alternativa2') != null){
                $alternativa2 = Alternativa::find($alternativas[1]->id);
                $alternativa2->questao_id = $ultimoIdQuestao;
                $alternativa2->enunciado = $request->input('enunciado_alternativa2');
                if($request->input('correta') == '2'){
                    $alternativa2->correta = true;
                }else{
                    $alternativa2->correta = false;
                }
                $alternativa2->save();
            }

            if($request->input('enunciado_alternativa3') != null){
                $alternativa3 = Alternativa::find($alternativas[2]->id);
                $alternativa3->questao_id = $ultimoIdQuestao;
                $alternativa3->enunciado = $request->input('enunciado_alternativa3');
                if($request->input('correta') == '3'){
                    $alternativa3->correta = true;
                }else{
                    $alternativa3->correta = false;
                }
                $alternativa3->save();
            }

            if($request->input('enunciado_alternativa4') != null){
                $alternativa4 = Alternativa::find($alternativas[3]->id);
                $alternativa4->questao_id = $ultimoIdQuestao;
                $alternativa4->enunciado = $request->input('enunciado_alternativa4');
                if($request->input('correta') == '4'){
                    $alternativa4->correta = true;
                }else{
                    $alternativa4->correta = false;
                }
                $alternativa4->save();
            }

            if($request->input('enunciado_alternativa5') != null){
                $alternativa5 = Alternativa::find($alternativas[4]->id);
                $alternativa5->questao_id = $ultimoIdQuestao;
                $alternativa5->enunciado = $request->input('enunciado_alternativa5');
                if($request->input('correta') == '5'){
                    $alternativa5->correta = true;
                }else{
                    $alternativa5->correta = false;
                }
                $alternativa5->save();
            }
        }

        $lista_id = $request->input('lista_id');
        if($lista_id != null) {
            return redirect('/lista/' . $lista_id)->with('success', 'Questão atualizada com sucesso!');
        }

    }

    public function destroy($id)
    {
        Questao::destroy($id);
        QuestaoListas::where('questao_id',$id)->delete();
        //return redirect('/lista')->with('success','Lista excluída com sucesso!');
        return back()->with('success','Questão excluída com sucesso!');
    }
}
