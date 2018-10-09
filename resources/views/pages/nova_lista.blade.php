@extends('layouts.app')

@section('mlista','active')

@section('conteudo')
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
                {{ csrf_field() }}
                <h3 class="title text-center mb-1" id="novoModalLabel">Nova Lista</h3>

                <div class="modal-body">
                    <div class="row">                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Nome">Nome<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                            
                            <input  v-model="nomeLista" type="text" class="form-control borda-input" name="nome" placeholder="Nome..." id="nome">
                            <label v-if="errors.nomeLista" class="text-danger" v-cloak>@{{errors.nomeLista}}</label>                                                        
                        </div>                                                       
                    </div>
                    <div class="row">                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Descrição">Descrição<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                
                                <textarea v-model='descricaoLista' class="form-control borda-input" name="descricao" placeholder="Descrição..." id="descricao" maxlength="255"></textarea>
                                <label v-if="errors.descricaoLista" class="text-danger" v-cloak>@{{errors.descricaoLista}}</label>                                                        
                            </div>                                                       
                    </div>                          
                </div>
                <div class="row">
                        <div class="col-md-9 mx-auto" style="margin-bottom: 10px;">
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

