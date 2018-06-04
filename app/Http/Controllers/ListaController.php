<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\ListaQuestao;
use App\Questao;
use App\QuestaoListas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
{

    public function nova(){
        return view('pages.nova_lista');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $lista = new ListaQuestao();
        $lista->nome = $request->input('nome');
        $lista->descricao = $request->input('descricao');
        $lista->autor_usuario_id = Auth::user()->id;

        if ($lista->save()){
            return redirect('/listas')->with('success','Lista criada com sucesso');
        }
    }

    public function edit($id)
    {
        $lista = ListaQuestao::find($id);
        return view('pages.editar_lista')->with('lista',$lista);
    }

    public function update(Request $request)
    {


        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $lista = ListaQuestao::find($request->input('id'));
        $lista->nome = $request->input('nome');
        $lista->descricao = $request->input('descricao');

        if($lista->save()){
            return redirect('/listas')->with('success','Salvo com sucesso!');
        }
    }

    public function destroy($id)
    {
        $questaoLista = QuestaoListas::select('questao_id')->where('lista_id',$id)->get();
        foreach($questaoLista as $id_questao){
            $questoes = QuestaoListas::select('questao_id')->where('questao_id',$id_questao->questao_id)->get();
            if(count($questoes)==1){
                Questao::destroy($id_questao->questao_id);
            }
        }

        ListaQuestao::destroy($id);

        return redirect('/listas')->with('success','Lista excluída com sucesso!');
    }

    public function lista($id){
        $lista = ListaQuestao::find($id);
        $questaoLista = QuestaoListas::select('questao_id')->where('lista_id',$lista->id);
        $questoes = Questao::whereIn('id',$questaoLista)->get();
        $alternativas = Alternativa::whereIn('questao_id',$questaoLista)->get();
        return view('pages.lista')->with('questoes',$questoes)->with('lista_id',$id)->with('alternativas',$alternativas)->with('nomeLista',$lista->nome);
    }

    public function show()
    {
        $listas = ListaQuestao::where('autor_usuario_id', Auth::user()->id)->orderBy('created_at','asc')->get();
        return view('pages.listas')->with('listas',$listas);
    }
}
