<?php

namespace App\Http\Controllers;

use App\Questao;
use Illuminate\Http\Request;

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
        //
    }

    public function show(Questao $questao)
    {
        //
    }

    public function edit(Questao $questao)
    {
        //
    }

    public function update(Request $request, Questao $questao)
    {
        //
    }

    public function destroy(Questao $questao)
    {
        //
    }
}
