@extends('layouts.app')

@section('musuario','active')

@section('conteudo')
<div class="card-header">
    <div class="row">
        <div class="col-md-4">
            <h5 class="title pt-2">Usuarios</h5>
        </div>

        <div class="col-md-8 pr-5">
            <a class="float-right" href="/usuario">
                <span class="input-group-text" id="basic-addon1">
                      <i class="material-icons">keyboard_backspace</i>
                </span>
            </a>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-12 m-auto">
            <form method="POST" action="/usuario/update/{{$usuario->id}}">
                <input type="hidden" name="id" value="{{$usuario->id}}">
                <h3 class="title text-center mb-1" id="novoModalLabel">Editar Usuario</h3>

                <div class="modal-body">
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">subtitles</i>
                                </span>
                            </div>
                            <input type="text" value="{{$usuario->matricula}}" class="form-control" name="matricula" placeholder="Matricula..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">account_box</i>
                                </span>
                            </div>
                            {{ csrf_field() }}
                            <input type="text" value="{{$usuario->nome}}" class="form-control " name="nome" placeholder="Nome..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>
                            {{ csrf_field() }}
                            <input value="{{$usuario->email}}" type="email" class="form-control " name="email" placeholder="Email..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">vpn_key</i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="senha" placeholder="Senha..." required>
                        </div>
                    </div>
                    <div class="text-center" style="margin-bottom: 10px;">
                        <input type="submit" id="login" name="editar" class="btn btn-modal col-sm-8" value="Atualizar"><br>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

