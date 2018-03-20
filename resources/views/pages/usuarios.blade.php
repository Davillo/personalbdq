@extends('layouts.app')

@section('index','active')

@section('conteudo')
<div class="card-header">
    <div class="row">
        <div class="col-md-4">
            <h5 class="title pt-2">Usuarios</h5>
        </div>

        <div class="col-md-8 pr-5">
            <a class="btn btn-success float-right" href="{{ url('novo_usuario') }}">Novo</a>
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
                                    <?php if ($usuario->matricula == null ){
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

                                <td>
                                    <a href="{{ url('edit/'.$usuario->id) }}" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">mode_edit</i></a>
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
@include('modals.modal_remover_usuario')