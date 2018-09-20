@extends('layouts.app')

@section('mlista','active')

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
            <h5 class="title pt-2">Listas</h5>
        </div>


        <div class="col-md-8 pr-5">
            <a class="float-right" href="/listas">
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
            <form method="POST" @submit="getCheckLista" id="dados" action="/lista/inserir">

                <h3 class="title text-center mb-1" id="novoModalLabel">Nova Lista</h3>

                <div class="modal-body">
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">account_box</i>
                                </span>
                            </div>
                            {{csrf_field()}}
                            <input  v-model="nomeLista" type="text" class="form-control" name="nome" placeholder="Nome..." id="nome">
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
                            <textarea v-model='descricaoLista' class="form-control" name="descricao" placeholder="Descrição..." id="descricao" maxlength="255"></textarea>
                        </div>
                    </div>
                </div>
                    <div class="text-center" style="margin-bottom: 10px;">
                        <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-sm-8" value="SALVAR"><br>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

