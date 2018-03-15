@extends('layouts.app')

@section('index','active')

@section('conteudo')
<div class="card-header">
    <div class="row">
        <div class="col-md-4">
            <h5 class="title pt-2">Usuarios</h5>
        </div>

        <div class="col-md-8 pr-5">
            <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#novoModal">Novo</button>
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
                            Matricula
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>

                        <th>
                            Operações
                        </th>
                    </thead>
                    <tbody>
                    @if(count($usuarios)>0)
                        @foreach($usuarios as $usuario)
                            <tr>

                                <td>
                                    <?php if($flagEdit != null){
                                        echo $flagEdit;
                                    }
                                    ?>

                                  <?php
                                    if($usuario->matricula == null){
                                        echo 'Não possui';
                                    }else{
                                     echo $usuario->matricula;
                                    }

                                      ?>
                                </td>

                                <td>
                                    {{$usuario->nome}}
                                </td>

                                <td>
                                    {{$usuario->email}}
                                 </td>
                                <!--data-toggle="modal"-->
                                <td>
                                   <a href="/edit"> <button type="submit" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;"  data-target="#editarModal"><i class="material-icons" style="font-size:18px;">mode_edit</i></button></a>
                                    <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;" data-toggle="modal" data-target="#removerModal"><i class="material-icons" style="font-size:18px;">delete</i></button>
                                </td>
                            </tr>
                        @endforeach




                    </tbody>
                    @else
                        <tr>Nenhum registro foi encontrado</tr>
                    @endif

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal  -->
@include('modals.modal_novo_usuario')
@include('modals.modal_editar_usuario')
@include('modals.modal_remover_usuario')