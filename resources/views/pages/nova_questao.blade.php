@extends('layouts.app')

@section('mlistas','active')
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
                <form @submit="getCheck" method="POST" id="dados" action="/questao/inserir">

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

                                <select @change="getForm" v-model="tipo" name="tipo" class="form-control" >
                                    <option value="" disabled >Selecione o tipo de questão...</option>
                                    <option value="Dissertativa">Dissertativa</option>
                                    <option value="Múltipla Escolha">Múltipla Escolha</option>
                                    <option value="Asserção Razão">Asserção Razão</option>
                                    <option value="Verdadeiro ou Falso">Verdadeiro ou Falso</option>
                                </select>
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


                                    <select v-model="categoria" name="categoria" class="form-control">
                                        <option value="" disabled>Categoria...</option>
                                        <option value="Avaliação 1">Avaliação 1</option>
                                        <option value="Avaliação 2">Avaliação 2</option>
                                        <option value="Enade">Enade</option>
                                    </select>

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

                                    <select v-model="dificuldade" name="dificuldade"  class="form-control">
                                        <option value="" disabled>Dificuldade...</option>
                                        <option value="Fácil">Fácil</option>
                                        <option value="Intermediário">Intermediário</option>
                                        <option value="Difícil">Difícil</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                    Palavras Chave:
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                    <input v-model="palavras_chave" type="text" class="form-control" name="palavras_chave" placeholder="Palavras chaves...">
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                    Enunciado:
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                    <textarea id="enunciado" type="text" class="form-control" name="enunciado" placeholder="Enunciado..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div v-if="multiplaEscolha">
                            <v-multiplaescolha></v-multiplaescolha>
                        </div>


                    <div class="text-center" style="margin-bottom: 10px;">
                        @if(isset($lista_id))
                        <input type="hidden" name="lista_id" value="{{$lista_id}}">
                        @endif
                        <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-sm-8" value="Cadastrar"><br>
                    </div>
                </form>
            </div>
        </div>
    </div> 
@endsection
