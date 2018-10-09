@extends('layouts.app')

@section('mcurso','active')

@section('conteudo')
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
                <form method="POST" @submit="getCheckAvaliacao" id="dados" action="/avaliacao/inserir">
                   {{ csrf_field() }}                   
                    <h3 class="title text-center mb-1" id="novoModalLabel">Nova Avaliacao</h3>

                    <div class="modal-body">
                            <div class="card card-nav-tabs card-plain">
                                    <div class="card-header card-header-danger">
                                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                        <div class="nav-tabs-navigation">
                                            <div class="nav-tabs-wrapper">
                                                <ul class="nav nav-tabs" data-tabs="tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#avaliacao" data-toggle="tab">Avaliação<span class="text-danger f-16" title="Campo obrigatório">*</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#cabecalho" data-toggle="tab">Cabeçalho</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#instrucoes" data-toggle="tab">Instruções</a>
                                                    </li>                                            
                                                </ul>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content pt-4">
                                            <div class="tab-pane active" id="avaliacao">
                                                <div class="row">                                                    
                                                    <div class="form-group col-md-9 mx-auto">
                                                        <label for="Título avaliação">Título avaliação<span class="text-danger f-16" title="Campo obrigatório">*</span></label>
                                                        <input v-model='tituloAvaliacao' type="text" class="form-control borda-input" name="titulo" placeholder="Titulo da avaliação...">
                                                        <label v-if="errors.tituloAvaliacao" class="text-danger" v-cloak>@{{errors.tituloAvaliacao}}</label>                                                        
                                                    </div>                                                       
                                                </div>                                                                                   
                                            </div>
                                            <div class="tab-pane" id="cabecalho">
                                                <div class="row">                                                    
                                                    <div class="form-group col-md-9 mx-auto">
                                                        <label for="Instituição">Instituição</label>
                                                        <input type="text" class="form-control borda-input" name="instituição" placeholder="Instituição...">
                                                    </div>    
                                                </div>  
                                                <div class="row">                                                        
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Professor">Professor</label>
                                                            <input type="text" class="form-control borda-input" name="professor" placeholder="Professor...">
                                                        </div>    
                                                </div> 
                                                <div class="row">                                                   
                                                    <div class="form-group col-md-9 mx-auto">
                                                        <label for="Curso">Curso</label>
                                                        <input type="text" class="form-control borda-input" name="curso" placeholder="Curso...">
                                                    </div>    
                                                </div> 
                                                <div class="row">                                                        
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Disciplina">Disciplina</label>
                                                            <input type="text" class="form-control borda-input" name="disciplina" placeholder="Disciplina...">
                                                        </div>    
                                                </div> 
                                                <div class="row">                                                        
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Turma">Turma</label>
                                                            <input type="text" class="form-control borda-input" name="turma" placeholder="Turma...">
                                                        </div>    
                                                </div>
                                                <div class="row">                                                        
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Categoria">Categoria</label>                                                           
                                                            <select name="avaliacao" class="form-control borda-input" >
                                                                <option value="">Selecione a categoria...</option>
                                                                <option value="AV1">Avaliação 1</option>
                                                                <option value="AV2">Avaliação 2</option>
                                                                <option value="ENADE">Enade</option>
                                                                <option value="PARCIAL">Parcial</option>
                                                            </select>
                                                        </div>    
                                                </div>                                                                                  
                                            </div>
                                            <div class="tab-pane" id="instrucoes">
                                                <div class="row">                                                        
                                                    <div class="form-group col-md-9 mx-auto">
                                                            <label for="Instruções">Instruções</label>
                                                            <textarea id="enunciado" type="text" class="form-control" name="instrucoes" placeholder="Instruções..."></textarea>
                                                    </div>    
                                                </div>   
                                                <div class="row">
                                                        <div class="col-md-9 mx-auto" style="margin-bottom: 10px;">
                                                            <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-md-2 text-center float-right mr-2" value="Finalizar"><br>
                                                        </div>
                                                </div> 
                                                <div class="row">
                                                        <div class="col-md-9 mx-auto text-center">
                                                            <label v-if="errors.botao" class="text-danger" v-cloak>@{{errors.botao}}</label>
                                                        </div>
                                                </div>                                 
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
