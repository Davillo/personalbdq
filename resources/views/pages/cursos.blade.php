@extends('layouts.app')

@section('mcurso','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Cursos</h5>
            </div>

            <div class="col-md-8 pr-5">
                <a class="btn btn-success float-right" href="{{ url('/novo_curso') }}">Novo curso</a>
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
                            Nome do curso
                        </th>
                        <th>
                            Tipo
                        </th>
                        </thead>
                        <tbody>

                            @if(count($cursos)>0)
                                @foreach($cursos as $curso)
                                <tr>

                                    <td class="td-fixo">
                                        {{$curso->nome}}
                                    </td>

                                    <td>
                                        {{$curso->tipo}}
                                    </td>

                                    <td>
                                        <a href="#" class="dropdown " data-toggle="dropdown">
                                            <i class="material-icons">
                                                more_horiz
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu" style="padding-left: 10px; " role="menu">
                                            <li><a href="/curso/edit/{{$curso->id}}">Editar</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#removerModal{{$curso->id}}">Excluir</a></li>
                                        </ul>
                                        @include('modals.modal_remover_curso')
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td>
                                    <tr>Nenhum registro cadastrado</tr>
                                </td>
                            @endif





                        </tbody>




                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal  -->
