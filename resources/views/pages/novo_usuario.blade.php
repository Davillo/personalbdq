@extends('layouts.app')

@section('musuario','active')

@section('conteudo')
<div v-if="errors.length" class='alert alert-danger'>
    <b>Por favor corrija os seguintes erros</b>
    <ul>
    <li v-for="erro in errors">@{{erro}}</li>
    </ul>
</div>
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
            <form method="POST" @submit="getCheckUsuario" id="dados" action="/usuario/inserir">

                <h3 class="title text-center mb-1" id="novoModalLabel">Novo Usuario</h3>

                <div class="modal-body">
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">subtitles</i>
                                </span>
                            </div>
                            <input v-model="matriculaUsuario" type="text" class="form-control" name="matricula" placeholder="Matricula..." id="matricula">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">account_box</i>
                                </span>
                            </div>
                            {{csrf_field()}}
                            <input v-model="nomeUsuario" type="text" class="form-control" name="nome" placeholder="Nome..." id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>
                            {{csrf_field()}}
                            <input v-model="emailUsuario" type="email" class="form-control " name="email" placeholder="Email..." id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">vpn_key</i>
                                </span>
                            </div>
                            <input v-model="senhaUsuario" type="password" class="form-control" name="senha" placeholder="Senha..." id="senha">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
                            </div>
                                {{csrf_field()}}

                                @if(count($cursos)>0)
                                    <select v-model="cursoUsuario" name="curso_id" class="form-control">
                                        <option value="" disabled>Selecione o curso...</option>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                        @endforeach
                                    </select>
                                @endif
                        </div>
                    </div>
                </div>
                    <div class="text-center" style="margin-bottom: 10px;">
                        <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-sm-8" value="Cadastrar"><br>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

