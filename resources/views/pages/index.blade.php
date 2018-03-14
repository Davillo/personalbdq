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
                            Senha
                        </th>
                        <th>
                            Operações
                        </th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            2015103358
                        </td>
                        <td>
                            Jaelson dos Santos Daniel
                        </td>
                        <td>
                            jaelson.jua@gmail.com
                        </td>
                        <td>
                            estaaquiasenha
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;" data-toggle="modal" data-target="#editarModal"><i class="material-icons" style="font-size:18px;">mode_edit</i></button>
                            <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;" data-toggle="modal" data-target="#removerModal"><i class="material-icons" style="font-size:18px;">delete</i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Minerva Hooper
                        </td>
                        <td>
                            Curaçao
                        </td>
                        <td>
                            Sinaai-Waas
                        </td>
                        <td class="text-right">
                            $23,789
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;" data-toggle="modal" data-target="#editarModal"><i class="material-icons" style="font-size:18px;">mode_edit</i></button>
                            <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">delete</i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sage Rodriguez
                        </td>
                        <td>
                            Netherlands
                        </td>
                        <td>
                            Baileux
                        </td>
                        <td class="text-right">
                            $56,142
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;" data-toggle="modal" data-target="#editarModal"><i class="material-icons" style="font-size:18px;">mode_edit</i></button>
                            <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">delete</i></button>
                        </td>
                        </td>
                    </tr>
                    </tbody>
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