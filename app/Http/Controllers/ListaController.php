<?php

namespace App\Http\Controllers;

use App\Alternativa;
use App\Comentario;
use App\ListaQuestao;
use App\Questao;
use App\QuestaoListas;
use App\Usuario;
use App\UsuariosListas;
use App\Datas;
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
            QuestaoListas::where('questao_id',$id_questao->questao_id)->delete();
            if(count($questoes)==1){
                Questao::destroy($id_questao->questao_id);
            }
        }

        ListaQuestao::destroy($id);

        return redirect('/listas')->with('success','Lista excluída com sucesso!');
    }

    public function lista($id){
        $lista = ListaQuestao::find($id);
        $listas = ListaQuestao::where('autor_usuario_id',Auth::user()->id)->get();
        $questaoLista = QuestaoListas::select('questao_id')->where('lista_id',$lista->id);
        $questoes = Questao::whereIn('id',$questaoLista)->get();
        $alternativas = Alternativa::whereIn('questao_id',$questaoLista)->get();
        $comentarios = Comentario::whereIn('questao_id',$questaoLista)->get();

        return view('pages.lista')->with('questoes',$questoes)->with('lista_id',$id)->with('alternativas',$alternativas)->with('nomeLista',$lista->nome)->with('listasUsuario',$listas)->with('comentarios',$comentarios);
    }

    public function show(){
        $listas = ListaQuestao::where('autor_usuario_id', Auth::user()->id)->orderBy('data_criacao','asc')->get();
        $idsListas = ListaQuestao::select('id')->where('autor_usuario_id', Auth::user()->id)->get();
        $compartilhadas = UsuariosListas::whereIn('lista_id',$idsListas)->get();
        $idsUsuarios = UsuariosListas::select('usuario_convidado_id')->whereIn('lista_id',$idsListas)->get();
        $usuarios = DB::table('usuario')->select('id','email')->whereIn('id',$idsUsuarios)->get();
        return view('pages.listas')->with('listas',$listas)->with('compartilhadas',$compartilhadas)->with('usuarios',$usuarios);
    }

    public function share($id){
        $lista = ListaQuestao::find($id);
        return view('pages.compartilhar_lista')->with('lista',$lista);
    }

    public function compartilharLista(Request $request){
            $email = $request->input('email');
            $idLista = $request->input('id');
            $usuario = Usuario::where('email','=',$email)->first();

            if(Auth::user()->email == $email){
                    return redirect('/lista/compartilhar/'.$idLista)->with('error','Não é possível compartilhar uma lista consigo mesmo.');
            }

     if($usuario!=null){


                    $checarJaCompartilhada =
                            DB::table('usuarios_listas')
                                ->select('usuario_convidado_id','lista_id')->where
                           ('usuario_convidado_id','=',$usuario->id)->where('lista_id','=',$idLista)->count();

            if($checarJaCompartilhada==0){
                $compartilhamento = new UsuariosListas();
                $compartilhamento->usuario_convidado_id = $usuario->id;
                $compartilhamento->lista_id = $idLista;
                $compartilhamento->autor_usuario_id = Auth::user()->id;
                $compartilhamento->data_criacao = Datas::getDataAtual();
                $compartilhamento->data_atualizado = Datas::getDataAtual();
                $compartilhamento->save();
                return redirect('/listas')->with('success','Lista compartilhada com sucesso.');

            }else{
                return redirect('/lista/compartilhar/'.$idLista)->with('error','Esta lista já foi compartilhada com esse usuário.');
            }



        }else{
                   return redirect('/lista/compartilhar/'.$idLista)->with('error','Este email de usuário não está cadastrado no PersonalBDQ.');

        }

    }

    public function listasCompartilhadas(){


        $listasCompartilhadas = DB::table('lista_questao')
            ->select('lista_questao.id','lista_questao.nome','lista_questao.descricao','lista_questao.data_criacao','usuario.nome as nomeUsuario')
            ->join('usuarios_listas', 'usuarios_listas.lista_id', '=', 'lista_questao.id')->join('usuario','usuario.id','=','lista_questao.autor_usuario_id')
            ->where('usuarios_listas.usuario_convidado_id', Auth::user()->id)
            ->get();


            return  view('pages.listas_compartilhadas')->with('listas',$listasCompartilhadas);
    }

    public function listaCompartilhada($id){

        $lista = ListaQuestao::find($id);
        $listas = ListaQuestao::where('autor_usuario_id',Auth::user()->id)->get();
        $questaoLista = QuestaoListas::select('questao_id')->where('lista_id',$lista->id);
        $questoes = Questao::whereIn('id',$questaoLista)->get();
        $alternativas = Alternativa::whereIn('questao_id',$questaoLista)->get();
        $comentarios = Comentario::whereIn('questao_id',$questaoLista)->get();


        return view('pages.lista_compartilhada')->with('questoes',$questoes)->with('lista_id',$id)->with('alternativas',$alternativas)->with('listaAtual',$lista)->with('listasUsuario',$listas)->with('comentarios',$comentarios);
    }

    public function excluirCompartilhada($id){
        UsuariosListas::destroy($id);
        return  redirect('/listas')->with('success','Usuário removido da lista com sucesso!');
    }

    public function clonarLista($id)
    {

        $lista = ListaQuestao::find($id);
        $novaLista = $lista->replicate();
        $novaLista->autor_usuario_id = Auth::user()->id;
        $novaLista->save();

        $questaoLista = QuestaoListas::select('questao_id')->where('lista_id',$id);
        $questoes = Questao::whereIn('id',$questaoLista)->get();


        foreach ($questoes as $questao){

            $novaQuestao = $questao->replicate();
            $novaQuestao->autor_usuario_id = Auth::user()->id;
            $novaQuestao->save();

            $alternativas = Alternativa::where('questao_id',$questao->id)->get();
            if(count($alternativas) != 0) {
                foreach ($alternativas as $alternativa) {
                    $novaAlternativa = $alternativa->replicate();
                    $novaAlternativa->questao_id = $novaQuestao->id;
                    $novaAlternativa->save();
                }
            }

            $questaoLista = new QuestaoListas();
            $questaoLista->lista_id = $novaLista->id;
            $questaoLista->questao_id = $novaQuestao->id;
            $questaoLista->save();

        }

        return redirect('/lista/'.$novaLista->id)->with('success',"Lista clonada com sucesso!");
    }
}
