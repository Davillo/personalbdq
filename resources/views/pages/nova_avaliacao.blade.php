@extends('layouts.app')

@section('mcurso','active')

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
                <h5 class="title pt-2">Avaliações</h5>
            </div>

            <div class="col-md-8 pr-5">
                <a class="float-right" href="/avaliacoes">
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
                <form method="POST" id="dados" action="/avaliacao/inserir">
                   
                    <h3 class="title text-center mb-1" id="novoModalLabel">Nova Avaliacao</h3>

                    <div class="modal-body">
                        <div class="row">
                            <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">subtitles</i>
                                </span>
                                </div>
                                {{ csrf_field() }}
                                <input type="text" class="form-control" name="titulo" placeholder="Titulo da avaliação">

                                </div>
                        </div>

                        <div class="text-center" style="margin-bottom: 10px;">
                            <input type="submit" id="cadastrar" name="criar" class="btn btn-modal col-sm-8" value="Cadastrar"><br>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
