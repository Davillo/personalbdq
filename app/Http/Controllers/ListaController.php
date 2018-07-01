<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\Datas;
use App\ListaQuestao;
use App\Questao;
use App\QuestaoListas;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use App\UsuariosListas;
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
        $lista->data_criacao = Datas::getDataAtual();
        $lista->data_atualizado = Datas::getDataAtual();


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
        $lista->data_atualizado = Datas::getDataAtual();

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
        $listas = ListaQuestao::where('autor_usuario_id', Auth::user()->id)->orderBy('data_criacao','asc')->get();
        return view('pages.listas')->with('listas',$listas);
    }

    public function share($id){
        $lista = ListaQuestao::find($id);
        return view('pages.compartilhar_lista')->with('lista',$lista);
    }

    public function compartilharLista(Request $request){
        $email = $request->input('email');
        $idLista = $request->input('id');
        $usuario = Usuario::where('email','=',$email)->first();

        if($usuario->email == $email){
            return redirect('/lista/compartilhar/'.$idLista)->with('error','Não é possível compartilhar uma lista consigo mesmo.');
        }

        if($usuario!=null){


            $checarJaCompartilhada =
                DB::table('usuarios_listas')
                    ->select('usuario_convidado_id','lista_id')->where
                    ('usuario_convidado_id','=',$usuario->id)->where('lista_id','=',$idLista);

            if($checarJaCompartilhada){
                return redirect('/lista/compartilhar/'.$idLista)->with('error','Esta lista já foi compartilhada com esse usuário.');
            }else{
                $compartilhamento = new UsuariosListas();
                $compartilhamento->usuario_convidado_id = $usuario->id;
                $compartilhamento->lista_id = $idLista;
                $compartilhamento->autor_usuario_id = Auth::user()->id;
                $compartilhamento->data_criacao = Datas::getDataAtual();
                $compartilhamento->data_atualizado = Datas::getDataAtual();
                $compartilhamento->save();
            }



        }else{
            return redirect('/lista/compartilhar/'.$idLista)->with('error','Este email de usuário não está cadastrado no PersonalBDQ.');

        }

    }
}
