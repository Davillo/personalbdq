@extends('layouts.app')

@section('conteudo')
<div class="card-header">
    <div class="row">
        <div class="col-md-4">
            <h5 class="title pt-2">Usuarios</h5>
        </div>
        <div class="col-md-8 pr-5">
            <button type="submit" class="btn btn-success float-right">Novo</button>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-10 m-auto">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Name
                    </th>
                    <th>
                        Country
                    </th>
                    <th>
                        City
                    </th>
                    <th>
                        Salary
                    </th>
                    <th class="text-right">
                        Operações
                    </th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Dakota Rice
                        </td>
                        <td>
                            Niger
                        </td>
                        <td>
                            Oud-Turnhout
                        </td>
                        <td class="text-right">
                            $36,738
                        </td>
                        <td class="text-right">
                            <button type="submit" class="btn btn-sm btn-info mr-1" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">mode_edit</i></button>
                            <button type="submit" class="btn btn-sm btn-danger" style="height:25px;width:50px;"><i class="material-icons" style="font-size:18px;">delete</i></button>

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
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection