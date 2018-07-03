<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\ListaQuestao;
use App\Questao;
use App\QuestaoListas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
{

    public function nova(){
        return view('pages.nova_lista');
    }

    public function store(Request $request)
    {

        date_default_timezone_set('America/Fortaleza');


        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $lista = new ListaQuestao();
        $lista->nome = $request->input('nome');
        $lista->descricao = $request->input('descricao');
        $lista->autor_usuario_id = Auth::user()->id;
        $lista->data_criacao = date('Y-m-d');
        $lista->data_atualizado = date('Y-m-d');


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
        date_default_timezone_set('America/Fortaleza');


        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $lista = ListaQuestao::find($request->input('id'));
        $lista->nome = $request->input('nome');
        $lista->descricao = $request->input('descricao');
        $lista->data_atualizado = date('Y-m-d');

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

    public function show(){
        $listas = ListaQuestao::where('autor_usuario_id', Auth::user()->id)->orderBy('data_criacao','asc')->get();
        return view('pages.listas')->with('listas',$listas);
    }

    public function listasCompartilhadas(){


        $listasCompartilhadas = DB::table('lista_questao')
            ->select('lista_questao.id','lista_questao.nome','lista_questao.descricao','lista_questao.data_criacao','usuario.nome as nomeUsuario')
            ->join('usuarios_listas', 'usuarios_listas.lista_id', '=', 'lista_questao.id')->join('usuario','usuario.id','=','lista_questao.autor_usuario_id')
            ->where('usuarios_listas.autor_usuario_id', Auth::user()->id)
            ->get();


            return  view('pages.listas_compartilhadas')->with('listas',$listasCompartilhadas);
    }


}
