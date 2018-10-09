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
                <form @submit="getCheck" method="POST" id="dados" action="/questao/inserir">
                    {{ csrf_field() }}
                    <h3 class="title text-center mb-1" id="novoModalLabel">Nova Questão</h3>

                    <div class="modal-body">
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Tipo de questão">Tipo de questão<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                 
                                <select @change="getForm" v-model="tipoQuestao" name="tipo" class="form-control borda-input" >
                                    <option value="">Selecione o tipo de questão...</option>
                                    <option value="Dissertativa">Dissertativa</option>
                                    <option value="Múltipla Escolha">Múltipla Escolha</option>
                                    <option value="Asserção Razão">Asserção Razão</option>
                                    <option value="Verdadeiro ou Falso">Verdadeiro ou Falso</option>
                                </select>
                                <label v-if="errors.tipoQuestao" class="text-danger" v-cloak>@{{errors.tipoQuestao}}</label>   
                            </div>
                        </div>


                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Categoria">Categoria<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                                  
                                <select v-model="categoriaQuestao" name="categoria" class="form-control borda-input">
                                    <option value="">Categoria...</option>
                                    <option value="Avaliação 1">Avaliação 1</option>
                                    <option value="Avaliação 2">Avaliação 2</option>
                                    <option value="Enade">Enade</option>
                                </select>
                                <label v-if="errors.categoriaQuestao" class="text-danger" v-cloak>@{{errors.categoriaQuestao}}</label>
                            </div>
                        </div>

                        <div class="row">                                                        
                                <div class="form-group col-md-9 mx-auto">
                                <label for="Dificuldade">Dificuldade<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                                                                    
                                <select v-model="dificuldadeQuestao" name="dificuldade"  class="form-control borda-input">
                                    <option value="">Dificuldade...</option>
                                    <option value="Fácil">Fácil</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Difícil">Difícil</option>
                                </select>
                                <label v-if="errors.dificuldadeQuestao" class="text-danger" v-cloak>@{{errors.dificuldadeQuestao}}</label>
                            </div>
                        </div>

                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Palavras Chave">Palavras Chave<span class="text-danger f-16" title="Campo obrigatório">*</span></label>    
                                <input v-model="palavras_chaveQuestao" type="text" class="form-control borda-input" name="palavras_chave" placeholder="Palavras chaves...">
                                <label v-if="errors.palavras_chaveQuestao" class="text-danger" v-cloak>@{{errors.palavras_chaveQuestao}}</label>
                            </div>
                        </div>

                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Enunciado">Enunciado<span class="text-danger f-16" title="Campo obrigatório">*</span></label>
                                <textarea id="enunciado" type="text" class="form-control" name="enunciado" placeholder="Enunciado..."></textarea>
                                <label v-if="errors.enunciadoQuestao" class="text-danger" v-cloak>@{{errors.enunciadoQuestao}}</label>
                            </div>
                        </div>
                    </div>

                    <div v-if="multiplaEscolha">
                        <v-multiplaescolha></v-multiplaescolha>
                    </div>


                    <div class="row">
                        <div class="col-md-9 mx-auto" style="margin-bottom: 10px;">
                            @if(isset($lista_id))
                            <input type="hidden" name="lista_id" value="{{$lista_id}}">
                            @endif
                            <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-md-2 text-center float-right mr-2" value="Cadastrar"><br>
                        </div>                      
                    </div>
                    <div class="row">
                        <div class="col-md-9 mx-auto text-center">
                            <label v-if="errors.botao" class="text-danger" v-cloak>@{{errors.botao}}</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
@endsection
