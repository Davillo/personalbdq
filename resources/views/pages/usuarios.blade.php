@extends('layouts.app')

@section('musuario','active')

@section('conteudo')
<div class="card-header">
    <div class="row">
        <div class="col-md-4">
            <h5 class="title pt-2">Usuarios</h5>
        </div>

        <div class="col-md-8 pr-5">
            <a class="btn btn-success float-right" href="{{ url('novo_usuario') }}">Novo Usuário</a>
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
                            Matrícula
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
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
                                        <a href="#" class="dropdown " data-toggle="dropdown">
                                            <i class="material-icons">
                                                more_horiz
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu" style="padding-left: 10px; " role="menu">
                                            <li><a href="{{ url('edit/'.$usuario->id) }}">Editar</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#removerModal{{$usuario->id}}">Excluir</a></li>
                                        </ul>
                                    @include('modals.modal_remover_usuario')
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    @else
                        <tr>
                            <td colspan="4">Nenhum usuário cadastrado</td>
                        </tr>
                    @endif

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal  -->
