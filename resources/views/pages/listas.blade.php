@extends('layouts.app')

@section('mlistas','active')
@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Listas</h5>
            </div>

            <div class="col-md-8 pr-5">
                <a class="btn btn-success float-right" href="{{ url('/nova_lista/')}}">Nova Lista</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="table-responsive">
                    <table class="table table-striped" style="margin-bottom: 60px">
                        <thead class="text-primary">
                        <th>
                            Nome
                        </th>

                        <th>
                            Descrição
                        </th>

                        <th>
                            Data de criação
                        </th>
                        <th>
                            Compartilhada
                        </th>
                        </thead>
                        <tbody>
                        @if(count($listas)>0)
                            @foreach($listas as $lista)
                                <tr>
                                    <td>
                                        <a href="lista/<?php echo base64_encode($lista->id)?>">{{$lista->nome}}</a>
                                    </td>

                                    <td class="td-fixo">
                                        {{$lista->descricao}}
                                    </td>

                                    <td>

                                        <?php echo date('d/m/y',strtotime($lista->data_criacao))?>

                                    </td>
                                    <td>
                                        @if(count($compartilhadas) != 0)
                                            @foreach($compartilhadas as $count => $compartilhada)
                                                @if($compartilhada->lista_id == $lista->id)
                                                    <a href="#" data-toggle="modal" data-target="#compartilhadosModal{{$lista->id}}">Ver Usuários</a>
                                                    @include('modals.modal_usuarios_lista_compartilhada')
                                                    @break
                                                @else
                                                    <?php $count++ ?>
                                                @endif
                                                @if(count($compartilhadas) == $count)
                                                    Não compartilhada
                                                @endif
                                            @endforeach
                                        @else
                                            Não compartilhada
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="dropdown " data-toggle="dropdown">
                                            <i class="material-icons">
                                                more_horiz
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu" style="padding-left: 10px; " role="menu">
                                            <li><a href="/lista/edit/<?php echo base64_encode($lista->id)?>">Editar</a></li>
                                            <li><a href="/lista/compartilhar/<?php echo base64_encode($lista->id)?>">Compartilhar Lista</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#removerModal{{$lista->id}}">Excluir</a></li>
                                        </ul>
                                        @include('modals.modal_remover_lista')

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">Nenhuma lista foi encontrada</td>
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
