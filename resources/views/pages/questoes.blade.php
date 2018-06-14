@extends('layouts.app')

@section('mquestoes','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Questões</h5>
            </div>

            <div class="col-md-8 pr-5">
                <a class="btn btn-success float-right" href="/nova_questao">Nova Questão</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 m-auto ">

                        <v-questoes questoes="{{$questoes}}"></v-questoes>

                        @foreach($questoes as $questao)
                            @include('modals.modal_remover_questao')
                            @include('modals.modal_visualizar_questao')
                        @endforeach

            </div>
        </div>
    </div>
@endsection

<!-- Modal  -->
