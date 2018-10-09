@extends('layouts.app')

@section('mavaliacoes','active')
@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Minhas Avaliações</h5>
            </div>

            <div class="col-md-8 pr-5">
                <a class="btn btn-success float-right" href="/nova_avaliacao/">Criar Avaliação</a>
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
                            Titulo
                        </th>
                        <th>
                            Quantidade de questões
                        </th>
                        <th>
                            Data de criação
                        </th>
                        </thead>
                        <tbody>

                            @if(count($avaliacoes)>0)
                                @foreach($avaliacoes as $avaliacao)
                                <tr>

                                    <td>
                                        <a href="avaliacao/{{$avaliacao->id}}">{{$avaliacao->titulo}}</a>
                                    </td>
                                    <td>
                                        @if ($avaliacao->qtQuestoes == 1)
                                            {{$avaliacao->qtQuestoes}} 
                                        @elseif($avaliacao->qtQuestoes > 1)
                                            {{$avaliacao->qtQuestoes}} 
                                        @else
                                            Nenhuma Questão
                                        @endif    
                                    </td>
                                    <td>
                                        <?php echo date('d/m/y',strtotime($avaliacao->data_criacao))?>
                                    </td>
                                    <td>
                                        @if ($avaliacao->qtQuestoes > 0)
                                
                                            <a title="Gerar PDF" href="avaliacao/gerarpdf/{{$avaliacao->id}}" target="_blank">    
                                                <i  class="material-icons" >
                                                    print
                                                </i>
                                            </a>   
                                            <a title="Gerar PDF" href="avaliacao/gerarpdf/{{$avaliacao->id}}" target="_blank">    
                                                <i  class="material-icons" >
                                                    list_alt
                                                </i>
                                            </a>                                      
                                       
                                        @else
                                        
                                            <a style="opacity:.5;pointer-events: none;" role="button" aria-disabled="true" href="#">    
                                                <i class="material-icons" >
                                                    print
                                                </i>
                                            </a> 
                                            <a style="opacity:.5;pointer-events: none;" role="button" aria-disabled="true" href="#">    
                                                    <i class="material-icons" >
                                                        list_alt
                                                    </i>
                                                </a>                                        
                                        
                                        @endif
                                        
                                        
                                        <a href="#" class="dropdown " data-toggle="dropdown">
                                            <i class="material-icons">
                                                more_horiz
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu" style="padding-left: 10px; " role="menu">
                                            <li><a href="/avaliacao/edit/<?php echo base64_encode($avaliacao->id)?>">Editar</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#removerModal{{$avaliacao->id}}">Excluir</a></li>
                                        </ul>
                                        @include('modals.modal_remover_avaliacao')
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">Nenhum avaliação foi encontrata</td>
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
