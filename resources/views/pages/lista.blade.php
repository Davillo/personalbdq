@extends('layouts.app')

@section('mlistas','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">{{$nomeLista}}</h5>
            </div>

            <div class="col-md-8 pr-5">
                <a class="btn btn-success float-right" href="/nova_questao/{{$lista_id}}">Nova Questão</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="table-responsive">
                    <table class="table table-striped" style="margin-bottom: 60px;">
                        <thead class="text-primary">
                        <th>
                           Enunciado
                        </th>

                        <th>
                            Categoria
                        </th>

                        <th>
                            Dificuldade
                        </th>

                        <th>
                            Tipo
                        </th>
                        </thead>
                        <tbody>
                        @if(count($questoes)>0)
                            @foreach($questoes as $questao)
                                <tr>
                                    <td class="td-fixo">
                                        {{$questao->enunciado}}
                                    </td>

                                    <td>
                                        {{$questao->categoria}}
                                    </td>

                                    <td>
                                        {{$questao->dificuldade}}
                                    </td>

                                    <td>
                                        {{$questao->tipo}}
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#visualizarModal{{$questao->id}}">
                                            <i class="material-icons">
                                                visibility
                                            </i>
                                        </a>

                                    </td>

                                    <td>
                                        <a href="#" class="dropdown " data-toggle="dropdown">
                                            <i class="material-icons">
                                                more_horiz
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu" style="padding-left: 10px; " role="menu">
                                            <li><a href="/questao/edit/{{$questao->id}}/{{$lista_id}}">Editar</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#removerModal{{$questao->id}}">Excluir</a></li>
                                        </ul>
                                        @include('modals.modal_remover_questao')
                                        @include('modals.modal_visualizar_questao')
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Nenhuma questão foi encontrada.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal  -->
