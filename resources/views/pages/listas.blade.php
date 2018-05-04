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
                    <table class="table table-striped">
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
                            Operações
                        </th>

                        </thead>
                        <tbody>
                        @if(count($listas)>0)
                            @foreach($listas as $lista)
                                <tr>

                                    <td>
                                        {{$lista->nome}}
                                    </td>

                                    <td>
                                        {{$lista->descricao}}
                                    </td>

                                    <td>

                                        <?php $data = new DateTime($lista->created_at);
                                        echo $data->format('d/m/y');
                                        ?>

                                    </td>


                                    <td>
                                        <a href="/lista/edit/{{$lista->id}}" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">mode_edit</i></a>
                                        <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;" data-toggle="modal" data-target="#removerModal"><i class="material-icons" style="font-size:18px;">delete</i></button>
                                        @include('modals.modal_remover_lista')
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Nenhuma lista foi encontrada</td>
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
