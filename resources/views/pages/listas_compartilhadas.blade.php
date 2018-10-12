@extends('layouts.app')

@section('mcompartilhadas','active')
@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Compartilhadas comigo</h5>
            </div>

            <div class="col-md-8 pr-5">

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
                            Autor da lista
                        </th>
                        </thead>
                        <tbody>
                        @if(count($listas)>0)
                            @foreach($listas as $lista)
                                <tr>
                                    <td>
                                        <a href="/lista/compartilhada/<?php echo base64_encode($lista->id)?>">{{$lista->nome}}</a>
                                    </td>

                                    <td class="td-fixo">
                                        {{$lista->descricao}}
                                    </td>

                                    <td>

                                        <?php echo date('d/m/y',strtotime($lista->data_criacao))?>

                                    </td>
                                    <td>
                                        {{$lista->nomeUsuario}}
                                    </td>
                                    <td>

                                        <a href="#" class="dropdown " data-toggle="dropdown">
                                            <i class="material-icons">
                                                more_horiz
                                            </i>
                                        </a>

                                        <ul class="dropdown-menu" style="padding-left: 10px; " role="menu">
                                           <li><a href="/lista/clonar/<?php echo base64_encode($lista->id)?>">Clonar Lista</a></li>
                                        </ul>

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
