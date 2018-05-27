@extends('layouts.app')

@section('mlistas','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Listas</h5>
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
                    <table class="table table-striped">
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

                        <th>
                            Operações
                        </th>
                        </thead>
                        <tbody>
                        @if(count($questoes)>0)
                            @foreach($questoes as $questao)
                                <tr>

                                    <td>
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
                                        <a href="/lista/edit/{{$questao->id}}" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">mode_edit</i></a>
                                        <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;" data-toggle="modal" data-target="#removerModal"><i class="material-icons" style="font-size:18px;">delete</i></button>

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
