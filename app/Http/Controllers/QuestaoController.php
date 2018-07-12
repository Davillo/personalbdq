<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\ListaQuestao;
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

    public function nova_vindo_questoes(){
        $listas = ListaQuestao::where('autor_usuario_id', Auth::user()->id)->get();
        return view('pages.nova_questao')->with("listas",$listas);
    }

    public function store(Request $request)
    {
        date_default_timezone_set('America/Fortaleza');

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
        $questao->data_criacao = date('Y-m-d');
        $questao->data_atualizado = date('Y-m-d');
        $questao->save();

        $ultimoIdQeustao = $questao->id;

        if($request->input('tipo') == 'Múltipla Escolha'){

            if($request->input('enunciado_alternativa1') != null){
                $alternativa1 = new Alternativa();
                $alternativa1->questao_id = $ultimoIdQeustao;
                $alternativa1->enunciado = $request->input('enunciado_alternativa1');
                $alternativa1->data_criacao = date('Y-m-d');
                $alternativa1->data_atualizado = date('Y-m-d');
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
                $alternativa2->data_criacao = date('Y-m-d');
                $alternativa2->data_atualizado = date('Y-m-d');
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
                $alternativa3->data_criacao = date('Y-m-d');
                $alternativa3->data_atualizado = date('Y-m-d');
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
                $alternativa4->data_criacao = date('Y-m-d');
                $alternativa4->data_atualizado = date('Y-m-d');
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
                $alternativa5->data_criacao = date('Y-m-d');
                $alternativa5->data_atualizado = date('Y-m-d');
                if($request->input('correta') == '5'){
                    $alternativa5->correta = true;
                }else{
                    $alternativa5->correta = false;
                }
                $alternativa5->save();
            }
        }

        if($request->input('lista_id') != null) {
            $questaoListas = new QuestaoListas();
            $questaoListas->questao_id = $ultimoIdQeustao;
            $questaoListas->lista_id = $request->input('lista_id');
            $questaoListas->save();

            return redirect('/lista/' . $questaoListas->lista_id)->with('success', 'Questão criada com sucesso!');
        }else{
            return redirect('/questoes')->with('success', 'Questão criada com sucesso!');
        }
    }

    public function show()
    {
        $questaoLista = Questao::select('questao_id')->where('autor_usuario_id',Auth::user()->id);
        $questoes = Questao::where('autor_usuario_id',Auth::user()->id)->get();
        $alternativas = Alternativa::whereIn('questao_id',$questaoLista)->get();

        $listas = ListaQuestao::where('autor_usuario_id',Auth::user()->id)->get();

        return view('pages.questoes')->with(compact('questoes'))->with('alternativas',$alternativas)->with('listasUsuario',$listas);

    }

    public function edit($id,$lista_id)
    {
        $questao = Questao::find($id);
        $alternativas = Alternativa::where('questao_id',$id)->get();
        return view('pages.editar_questao')->with('questao',$questao)->with('alternativas',$alternativas)->with('lista_id',$lista_id);

    }

    public function editarQuestao($id)
    {
        $questao = Questao::find($id);
        $alternativas = Alternativa::where('questao_id',$id)->get();
        return view('pages.editar_questao')->with('questao',$questao)->with('alternativas',$alternativas);

    }

    public function update(Request $request){
        date_default_timezone_set('America/Fortaleza');


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
        $questao->data_atualizado = date('Y-m-d');
        $questao->save();

        $ultimoIdQuestao = $questao->id;

        $alternativas = Alternativa::where('questao_id',$ultimoIdQuestao)->get();

        if($questao->tipo == "Múltipla Escolha" || $questao->tipo == "Asserção Razão" || $questao->tipo == "Verdadeiro ou Falto"){

            if($request->input('enunciado_alternativa1') != null){
                $alternativa1 = Alternativa::find($alternativas[0]->id);
                $alternativa1->questao_id = $ultimoIdQuestao;
                $alternativa1->enunciado = $request->input('enunciado_alternativa1');
                $alternativa1->data_atualizado = date('Y-m-d');
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
                $alternativa2->data_atualizado = date('Y-m-d');
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
                $alternativa3->data_atualizado = date('Y-m-d');
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
                $alternativa4->data_atualizado = date('Y-m-d');
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
                $alternativa5->data_atualizado = date('Y-m-d');
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
        }else{
            return redirect('/questoes/')->with('success', 'Questão atualizada com sucesso!');
        }

    }

    public function destroy($id)
    {
        QuestaoListas::where('questao_id',$id)->delete();
        Questao::destroy($id);
        return back()->with('success','Questão excluída com sucesso!');
    }
    public function removerQuestaoLista($id,$lista_id)
    {
        QuestaoListas::where('questao_id',$id)->where('lista_id',$lista_id)->delete();
        return back()->with('success','Questão removida da lista com sucesso!');
    }

    public function fazerCopia(Request $request)
    {
        $relacaoQuestao = QuestaoListas::where('questao_id',$request->input('questao_id'))->where('lista_id',$request->input('lista_id'))->get();

        if(count($relacaoQuestao)==0){
            $questaoLista = new QuestaoListas();
            $questaoLista->lista_id = $request->input('lista_id');
            $questaoLista->questao_id = $request->input('questao_id');
            $questaoLista->save();
            return redirect('/lista/'.$request->input('lista_id'))->with('success','Questão adicionada a lista com sucesso!');
        }else{
            return redirect('/lista/'.$request->input('lista_id'))->with('error','A questão já está associada a esta lista!');
        }

    }
}
