@extends('layouts.app')

@section('mcompartilhadas','active')
@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Minhas Avaliações</h5>
            </div>

            <div class="col-md-8 pr-5">

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
                        </thead>
                        <tbody>   
                            <tr>
                                <td colspan="5">Nenhuma questão foi encontrada.</td>
                            </tr>       
                        </tbody>
                        </table>
                    </div>
                </div>
         </div>
    </div>
@endsection

<!-- Modal  -->
