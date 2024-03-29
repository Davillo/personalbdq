@extends('layouts.app')

@section('mcurso','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Cursos</h5>
            </div>


            <div class="col-md-8 pr-5">
                <a class="float-right" href="/curso">
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
                <form method="POST" @submit="getCheckCurso" id="dados" action="/curso/inserir">
                    {{ csrf_field() }}
                    <h3 class="title text-center mb-1" id="novoModalLabel">Novo Curso</h3>

                    <div class="modal-body">
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Nome do curso">Nome do curso<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                       
                                <input v-model.trim="nomeCurso" type="text" class="form-control borda-input" value="<?php if(isset($curso)) echo $curso->nome ?>" name="nome" placeholder="Nome do curso">
                                <label v-if="errors.nomeCurso" class="text-danger" v-cloak>@{{errors.nomeCurso}}</label>                            
                            </div>
                        </div>
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Tipo do curso">Tipo do curso<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                                                                    
                                <select v-model="tipoCurso" name="tipo" class="form-control borda-input">
                                    <option value="">Selecione o tipo...</option>
                                    <option value="BACHAREL">Bacharel</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="TECNÓLOGO">Tecnólogo</option>
                                </select>
                                <label v-if="errors.tipoCurso" class="text-danger" v-cloak>@{{errors.tipoCurso}}</label>                            
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
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
