<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Avaliacao;
use Illuminate\Support\Facades\Auth;
use App\QuestaoAvaliacao;
use App\Questao;
use App\Alternativa;
use App\Datas;
use PDF;

class AvaliacaoController extends Controller
{
    public function avaliacoes(){
        $avaliacoes = Avaliacao::where('autor_usuario_id', Auth::user()->id)->get();
        foreach ($avaliacoes as $index => $avaliacao) {
            $idsQuestaoAvaliacao = QuestaoAvaliacao::select('questao_id')->where('avaliacao_id',$avaliacao->id);
            $questoes = Questao::whereIn('id',$idsQuestaoAvaliacao)->get();
            $avaliacoes[$index]['qtQuestoes'] = count($questoes);
            
        }
        return view('pages.avaliacoes')->with('avaliacoes',$avaliacoes);
    }

    public function avaliacao($id){

        try{
            $avaliacao = Avaliacao::find(base64_decode($id));
            $idsQuestaoAvaliacao = QuestaoAvaliacao::select('questao_id')->where('avaliacao_id',$avaliacao->id);
            $questoes = Questao::whereIn('id',$idsQuestaoAvaliacao)->get();
            $alternativas = Alternativa::whereIn('questao_id',$idsQuestaoAvaliacao)->get();

            return view('pages.avaliacao')->with('questoes',$questoes)->with('avaliacao', $avaliacao)->with('alternativas',$alternativas);
        }catch (\Exception $exception){
            return redirect('/404');
        }

    }

    public function adicionarQuestoes($id){

        try{

            $avaliacao = Avaliacao::find($id);
            $questoesjaadd = QuestaoAvaliacao::select('questao_id')->where('avaliacao_id',$avaliacao->id)->get();

            $questaoLista = Questao::select('questao_id')->where('autor_usuario_id',Auth::user()->id);
            $questoes = Questao::where('autor_usuario_id',Auth::user()->id)->get();
            $alternativas = Alternativa::whereIn('questao_id',$questaoLista)->get();
            return view('pages.adicionar_questao')->with(compact('questoes'))->with(compact('questoesjaadd'))->with('avaliacao', $avaliacao)->with('alternativas',$alternativas);
        }catch (\Exception $exception){
            return redirect('/404');
        }


    }

    public function storeQuestoesAvaliacao(Request $request){
        $questoes = $request['questoesavaliacao'];
        $idavaliacao = $request['idavaliacao'];

        foreach($questoes as $questao){
            $aux = new QuestaoAvaliacao();
            $aux->questao_id = $questao;
            $aux->avaliacao_id = $idavaliacao;
            $aux->save();
        }
        return json_encode($questoes);
    }

    public function nova_avaliacao(){
        return view('pages.nova_avaliacao');
    }

    public function store(Request $request){
        date_default_timezone_set('America/Fortaleza');

        $this->validate($request, [
            'titulo' => 'required',
        ]);

        $avaliacao = new Avaliacao();
        $avaliacao->titulo = $request->input('titulo');
        $avaliacao->instituicao = $request->input('instituicao');
        $avaliacao->logo = $request->input('logo');
        $avaliacao->professor = $request->input('professor');
        $avaliacao->curso = $request->input('curso');
        $avaliacao->disciplina = $request->input('disciplina');
        $avaliacao->turma = $request->input('turma');
        $avaliacao->avaliacao = $request->input('avaliacao');
        $avaliacao->instrucao = $request->input('instrucao');
        $avaliacao->autor_usuario_id = Auth::user()->id;
        $avaliacao->data_criacao = date('Y-m-d');
        $avaliacao->data_atualizado = date('Y-m-d');
        
        if ($avaliacao->save()){
            return redirect('/avaliacoes')->with('success','Avaliacao criada com sucesso');
        }
    }

    public function editarAvaliacao($id){

        try{
            $avaliacao = Avaliacao::findOrFail(base64_decode($id));
            return view('pages.editar_avaliacao')->with('avaliacao',$avaliacao);
        }catch (\Exception $exception){
           return redirect('/404');
        }

    }

    public function update(Request $request){

        $this->validate($request, ['titulo' => 'required']);

        $avaliacao = Avaliacao::find($request->input('id'));
        $avaliacao->titulo = $request->input('titulo');
        $avaliacao->instituicao = $request->input('instituicao');
        $avaliacao->logo = $request->input('logo');
        $avaliacao->professor = $request->input('professor');
        $avaliacao->curso = $request->input('curso');
        $avaliacao->disciplina = $request->input('disciplina');
        $avaliacao->turma = $request->input('turma');
        $avaliacao->avaliacao = $request->input('avaliacao');
        $avaliacao->instrucao = $request->input('instrucao');
        $avaliacao->data_atualizado = Datas::getDataAtual();

        if($avaliacao->save()){
            return redirect('/avaliacoes')->with('success','Editado com sucesso!');
        }
    }

    public function removerQuestaoAvaliacao($id,$avaliacao_id)
    {
        QuestaoAvaliacao::where('questao_id',$id)->where('avaliacao_id',$avaliacao_id)->delete();
        return back()->with('success','Questão removida da avaliação com sucesso!');
    }
   
    public function destroy($id)
    {
        $idsQuestaoAvaliacao = QuestaoAvaliacao::select('questao_id')->where('avaliacao_id',$id)->get();
        foreach($idsQuestaoAvaliacao as $id_questao){
            QuestaoAvaliacao::where('questao_id',$id_questao->questao_id)->where('avaliacao_id', $id)->delete();
        }

        Avaliacao::destroy($id);

        return redirect('/avaliacoes')->with('success','Avaliação excluída com sucesso!');
    }

    public function gerarPdf($id){
        $avaliacao = Avaliacao::find($id);
        $questoesAvaliacao = QuestaoAvaliacao::select('questao_id')->where('avaliacao_id',$avaliacao->id)->get();
        
        $questoes = Questao::whereIn('id',$questoesAvaliacao)->get();
        $alternativas = Alternativa::whereIn('questao_id',$questoesAvaliacao)->get();

        $pdf = PDF::loadView('templates.avaliacao', compact('questoes', 'alternativas', 'avaliacao'));
        return $pdf->stream($avaliacao->titulo.'.pdf');
        //return view('templates.avaliacao')->with('questoes', $questoes)->with('alternativas',$alternativas);
    }

    public function gerarGabarito($id){
        $avaliacao = Avaliacao::find($id);
        $questoesAvaliacao = QuestaoAvaliacao::select('questao_id')->where('avaliacao_id',$avaliacao->id)->get();
        
        $questoes = Questao::whereIn('id',$questoesAvaliacao)->get();
        $alternativas = Alternativa::whereIn('questao_id',$questoesAvaliacao)->get();

        $pdf = PDF::loadView('templates.gabarito', compact('questoes', 'alternativas', 'avaliacao'));
        return $pdf->stream($avaliacao->titulo.'.pdf');
        //return view('templates.avaliacao')->with('questoes', $questoes)->with('alternativas',$alternativas);
    }
}
