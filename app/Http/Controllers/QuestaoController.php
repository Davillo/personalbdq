<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\Comentario;
use App\IdAleatorio;
use App\ListaQuestao;
use App\Questao;
use App\QuestaoListas;
use App\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\QuestaoAvaliacao;

class QuestaoController extends Controller
{
    public function nova($id){//vindo de lista, GET tambem, questao dentro de lista
            return view('pages.nova_questao')->with("lista_id",$id);
    }

    public function nova_vindo_questoes(){ //novo cadastro , GET       
        $vindoDeQuestoes = true;
        return view('pages.nova_questao')->with("vindoDeQuestoes",$vindoDeQuestoes);
    }


    public function store(Request $request)//salvar questão
    {

        date_default_timezone_set('America/Fortaleza');

        $questao = new Questao();

        $questao->enunciado = $request->input('enunciado');
        $questao->palavras_chave = $request->input('palavras_chave');
        $questao->categoria = $request->input('categoria');
        $questao->tipo = $request->input('tipo');
        $questao->dificuldade = $request->input('dificuldade');
        $questao->autor_usuario_id = Auth::user()->id;
        $questao->data_criacao = date('Y-m-d');
        $questao->data_atualizado = date('Y-m-d');
        $questao->id = IdAleatorio::gerar();
        if($questao->tipo == 'Dissertativa'){
            $questao->resposta = $request->input('resposta');
            $questao->quantidadeLinhas = $request->input('quantidadeLinhas');
        }
        $questao->save(); // salvando questão

        $ultimoIdQeustao = $questao->id; // recuperando ultimo id salvo

        if($request->input('tipo') == 'Múltipla Escolha' || $request->input('tipo') == 'Asserção Razão' || $request->input('tipo') == 'Verdadeiro ou Falso'){

            if($request->input('enunciado_alternativa1') != null){
                $alternativa1 = new Alternativa();
                $alternativa1->id = IdAleatorio::gerar();
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
                $alternativa2->id = IdAleatorio::gerar();

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
                $alternativa3->id = IdAleatorio::gerar();

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
                $alternativa4->id = IdAleatorio::gerar();
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
                $alternativa5->id = IdAleatorio::gerar();

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

        if($request->input(('lista_id')) != null) {
            $decrypt = base64_decode($request->input('lista_id'));
            $questaoListas = new QuestaoListas();
            $questaoListas->id = IdAleatorio::gerar();
            $questaoListas->questao_id = $ultimoIdQeustao;
            $questaoListas->lista_id = $decrypt;
            $questaoListas->save();

            return redirect('/lista/' . base64_encode($decrypt))->with('success', 'Questão criada com sucesso!');
        }else{
            return redirect('/questoes')->with('success', 'Questão criada com sucesso!');
        }
    }

    public function show()
    {
        $questaoLista = Questao::select('questao_id')->where('autor_usuario_id',Auth::user()->id);
        $questoes = Questao::where('autor_usuario_id',Auth::user()->id)->get();


        $alternativas = Alternativa::whereIn('questao_id',$questaoLista)->get();

        $comentarios = Comentario::whereIn('questao_id',$questaoLista)->get();
        $idsUsuariosComentario = Comentario::select('autor_usuario_id')->whereIn('questao_id',$questaoLista)->get();

        $usuarios = Usuario::select('id','nome')->whereIn('id',$idsUsuariosComentario)->get();
        $listas = ListaQuestao::where('autor_usuario_id',Auth::user()->id)->get();

        return view('pages.questoes')->with(compact('questoes'))->with('alternativas',$alternativas)->with('listasUsuario',$listas)->with('comentarios',$comentarios)->with('usuarios',$usuarios);

    }

    public function edit($id,$lista_id)
    {

        try{
            $questao = Questao::findOrFail(base64_decode($id));
            $alternativas = Alternativa::where('questao_id',base64_decode($id))->get();
            return view('pages.editar_questao')->with('questao',$questao)->with('alternativas',$alternativas)->with('lista_id',base64_decode($lista_id));
        }catch (\Exception $exception){
            return redirect('/404');
        }


    }

    public function editarQuestao($id)
    {
        try{

            $questao = Questao::findOrFail(($id));
            $alternativas = Alternativa::where('questao_id',($id))->get();
            return view('pages.editar_questao')->with('questao',$questao)->with('alternativas',$alternativas);
        }catch (\Exception $exception){
            return view('pages.error404');
        }

    }

    public function update(Request $request){
        date_default_timezone_set('America/Fortaleza');

        if($request->input('tipo') == 'Dissertativa'){
            $this->validate($request,[
                'enunciado' => 'required',
                'palavras_chave' => 'required',
                'dificuldade' => 'required',
                'categoria' => 'required',
                'resposta' => 'required',
                'quantidadeLinhas' => 'required'
            ]);
        }

        $questao = Questao::find($request->input('id'));
        $questao->enunciado = $request->input('enunciado');
        $questao->palavras_chave = $request->input('palavras_chave');
        $questao->categoria = $request->input('categoria');
        $questao->dificuldade = $request->input('dificuldade');
        $questao->autor_usuario_id = Auth::user()->id;
        $questao->data_atualizado = date('Y-m-d');
        if($questao->tipo == 'Dissertativa'){
            $questao->resposta = $request->input('resposta');
            $questao->quantidadeLinhas = $request->input('quantidadeLinhas');
        }
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

            return redirect('/questao/edit/' .($questao->id))->with('success', 'Questão atualizada com sucesso!');
    }

    public function destroy($id)    
    {
        QuestaoListas::where('questao_id',$id)->delete();
        QuestaoAvaliacao::where('questao_id',$id)->delete();
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
        $this->validate($request,[
            'lista_id' => 'required'
        ]);
        
        $relacaoQuestao = QuestaoListas::where('questao_id',$request->input('questao_id'))->where('lista_id',$request->input('lista_id'))->get();

        if(count($relacaoQuestao)==0){
            $questaoLista = new QuestaoListas();
            $questaoLista->id = IdAleatorio::gerar();
            $questaoLista->lista_id = $request->input('lista_id');
            $questaoLista->questao_id = $request->input('questao_id');
            $questaoLista->save();
            return redirect('/listas/')->with('success','Questão adicionada com sucesso!');
        }else{
            return redirect('/listas/')->with('error', 'Questão já adicionada a esta lista!');
        }

    }

    public function clonarQuestao(Request $request)
    {

        $questao = Questao::findOrFail($request->input('questao_id'));
        $alternativas = Alternativa::where('questao_id',$request->input('questao_id'))->get();
        $novaQuestao = $questao->replicate();
        $novaQuestao->id = IdAleatorio::gerar();
        $novaQuestao->autor_usuario_id = Auth::user()->id;
        $novaQuestao->save();

        if(count($alternativas) != 0) {
            foreach ($alternativas as $alternativa) {
                $novaAlternativa = $alternativa->replicate();
                $novaAlternativa->id = IdAleatorio::gerar();
                $novaAlternativa->questao_id = $novaQuestao->id;
                $novaAlternativa->save();
            }
        }

        $questaoLista = new QuestaoListas();
        $questaoLista->id = IdAleatorio::gerar();
        $questaoLista->lista_id = $request->input('lista_id');
        $questaoLista->questao_id = $novaQuestao->id;
        $questaoLista->save();

        return redirect('/lista/'.base64_encode($request->input('lista_id')))->with('success',"Questão clonada com sucesso!");
    }

    public function adicionarComentario(Request $request)
    {
        $this->validate($request,[
            'comentario' => 'required'
        ]);

        $comentario = new Comentario();
        $comentario->id = IdAleatorio::gerar();
        $comentario->comentario = $request->input('comentario');
        $comentario->questao_id = $request->input('questao_id');
        $comentario->autor_usuario_id = Auth::user()->id;
        $comentario->data_criacao = date('Y-m-d');
        $comentario->data_atualizado = date('Y-m-d');
        $comentario->save();

        return redirect('/lista/compartilhada/'.base64_encode($request->input('lista_id')))->with('success','Comentário feito com sucesso!');

    }

    public function excluirComentario($id)
    {
       Comentario::destroy($id);
        return back()->with('success','Comentário excluído com sucesso!');
    }
}

