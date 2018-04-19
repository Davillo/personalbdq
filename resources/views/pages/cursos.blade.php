@extends('layouts.app')

@section('mcurso','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Cursos</h5>
            </div>

            <div class="col-md-8 pr-5">
                <a class="btn btn-success float-right" href="{{ url('/novo_curso') }}">Novo</a>
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
                            Nome do curso
                        </th>
                        <th>
                            Tipo
                        </th>

                        <th>
                            Operações
                        </th>
                        </thead>
                        <tbody>

                            @if(count($cursos)>0)
                                @foreach($cursos as $curso)
                                <tr>

                                    <td>

                                        {{$curso->nome}}
                                    </td>

                                    <td>
                                        {{$curso->tipo}}
                                    </td>



                                    <td>
                                        <a href="/curso/edit/{{$curso->id}}" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">mode_edit</i></a>
                                        <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;" data-toggle="modal" data-target="#removerModal"><i class="material-icons" style="font-size:18px;">delete</i></button>
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
