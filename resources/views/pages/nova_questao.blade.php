@extends('layouts.app')

@section('mlistas','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Questão</h5>
            </div>


            <div class="col-md-8 pr-5">
                <a class="float-right" href="javascript:history.back();">
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
                <form method="POST" id="dados" action="/nova_questao">

                    <h3 class="title text-center mb-1" id="novoModalLabel">Nova Questão</h3>

                    <div class="modal-body">

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

                                <select @change="getForm" name="tipo" class="form-control" required>
                                    <option value="">Selecione o tipo de questão...</option>
                                    <option value="Dissertativa">Dissertativa</option>
                                    <option value="Múltipla Escolha">Múltipla Escolha</option>
                                    <option value="Asserção Razão">Asserção Razão</option>
                                    <option value="Verdadeiro ou Falso">Verdadeiro ou Falso</option>
                                </select>
                            </div>
                        </div>

                        <div v-if="multiplaEscolha">
                            <v-multiplaescolha></v-multiplaescolha>
                        </div>

                        <div v-if="dissertativa">
                            <v-dissertativa></v-dissertativa>
                        </div>
                    </div>

                    <div class="text-center" style="margin-bottom: 10px;">
                        <input type="hidden" name="lista_id" value="{{$lista_id}}">
                        <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-sm-8" value="Cadastrar"><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
