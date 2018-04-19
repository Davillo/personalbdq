<?php

namespace App\Http\Controllers;

use App\ListaQuestao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
{

    public function nova(){
        return view('modals.nova_lista');
    }

    public function store(Request $request)
    {
        $lista = new ListaQuestao();
        $lista->nome = $request->input('nome');
        $lista->descricao = $request->input('descricao');
        $lista->autor_usuario_id = Auth::user()->id;

        if ($lista->save()){
            return redirect('/listas')->with('success','Lista criada com sucesso');
        }
    }

    public function show()
    {
        $listas = ListaQuestao::where('autor_usuario_id', Auth::user()->id)->orderBy('created_at','asc')->get();
        //$listas = ListaQuestao::orderBy('created_at', 'asc')->get();
        return view('pages.listas')->with('listas',$listas);
    }

    public function edit(ListaQuestao $listaQuestao)
    {
        //
    }

    public function update(Request $request, ListaQuestao $listaQuestao)
    {
        //
    }

    public function destroy($id)
    {
        ListaQuestao::destroy($id);
        return redirect('/listas')->with('success','Lista excluída com sucesso!');
    }
}