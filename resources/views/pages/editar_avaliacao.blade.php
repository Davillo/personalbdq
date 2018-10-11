@extends('layouts.app')

@section('mavaliacoes','active')

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
                <form method="POST" action="/avaliacao/update">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" value="{{ $avaliacao->id }}" name="id" >
                    <h3 class="title text-center mb-1" id="novoModalLabel">Editar Avaliação</h3>

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
                                                    <li class="nav-item" style="margin-left:55%;">
                                                        <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal text-center m-0" value="Atualizar"><br>                                                        
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
                                                        <input value="{{ $avaliacao->titulo }}" type="text" class="form-control borda-input" name="titulo" placeholder="Titulo da avaliação...">
                                                    </div>                                                       
                                                </div>                                                                                   
                                            </div>
                                            <div class="tab-pane" id="cabecalho">
                                                <div class="row">                                                    
                                                    <div class="form-group col-md-9 mx-auto">
                                                        <label for="Instituição">Instituição</label>
                                                        <input @isset($avaliacao->instituicao)
                                                            value="{{ $avaliacao->instituicao }}"
                                                        @endisset type="text" class="form-control borda-input" name="instituicao" placeholder="Instituição...">
                                                    </div>    
                                                </div> 
                                                <div class="row">                                                    
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Logo">Logo</label>
                                                            <div class="col-md-9">
                                                                <button id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-modal col-md-3 borda-input mr-3" name="logo">Logo</button>
                                                                <img @isset($avaliacao->logo)
                                                                src="{{ $avaliacao->logo }}"
                                                                @endisset id="holder" style="height:50px;width:200px;">
                                                            </div>    
                                                            <input class="form-control" type="hidden" name="logo" id="thumbnail" @isset($avaliacao->logo)
                                                            value="{{ $avaliacao->logo }}"
                                                            @endisset>
                                                        </div>    
                                                </div> 
                                                <div class="row">                                                        
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Professor">Professor</label>
                                                            <input @isset($avaliacao->professor)
                                                            value="{{ $avaliacao->professor }}"
                                                        @endisset type="text" class="form-control borda-input" name="professor" placeholder="Professor...">
                                                        </div>    
                                                </div> 
                                                <div class="row">                                                   
                                                    <div class="form-group col-md-9 mx-auto">
                                                        <label for="Curso">Curso</label>
                                                        <input @isset($avaliacao->curso)
                                                        value="{{ $avaliacao->curso }}"
                                                    @endisset type="text" class="form-control borda-input" name="curso" placeholder="Curso...">
                                                    </div>    
                                                </div> 
                                                <div class="row">                                                        
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Disciplina">Disciplina</label>
                                                            <input @isset($avaliacao->disciplina)
                                                            value="{{ $avaliacao->disciplina }}"
                                                        @endisset type="text" class="form-control borda-input" name="disciplina" placeholder="Disciplina...">
                                                        </div>    
                                                </div> 
                                                <div class="row">                                                        
                                                        <div class="form-group col-md-9 mx-auto">
                                                            <label for="Turma">Turma</label>
                                                            <input @isset($avaliacao->turma)
                                                            value="{{ $avaliacao->turma }}"
                                                        @endisset type="text" class="form-control borda-input" name="turma" placeholder="Turma...">
                                                        </div>    
                                                </div>
                                                @if(isset($avaliacao->avaliacao))
                                                <div class="row">                                                        
                                                    <div class="form-group col-md-9 mx-auto">
                                                        <label for="Categoria">Categoria</label>                                                                                                          
                                                        <select name="avaliacao" class="form-control borda-input">
                                                            <option value="">Categoria...</option>
                                                            @if($avaliacao->avaliacao == 'AV1')
                                                                <option value="">Selecione a categoria...</option>
                                                                <option value="AV1" selected>Avaliação 1</option>
                                                                <option value="AV2">Avaliação 2</option>
                                                                <option value="ENADE">Enade</option>
                                                                <option value="PARCIAL">Parcial</option>
                                                            @elseif($avaliacao->avaliacao == 'AV2')
                                                                <option value="">Selecione a categoria...</option>
                                                                <option value="AV1">Avaliação 1</option>
                                                                <option value="AV2" selected>Avaliação 2</option>
                                                                <option value="ENADE">Enade</option>
                                                                <option value="PARCIAL">Parcial</option>
                                                            @elseif($avaliacao->avaliacao == 'ENADE')
                                                                <option value="">Selecione a categoria...</option>
                                                                <option value="AV1">Avaliação 1</option>
                                                                <option value="AV2">Avaliação 2</option>
                                                                <option value="ENADE" selected>Enade</option>
                                                                <option value="PARCIAL">Parcial</option>
                                                            @else
                                                                <option value="">Selecione a categoria...</option>
                                                                <option value="AV1">Avaliação 1</option>
                                                                <option value="AV2">Avaliação 2</option>
                                                                <option value="ENADE">Enade</option>
                                                                <option value="PARCIAL" selected>Parcial</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>     
                                                @else
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
                                                @endif
                                                                                                                              
                                            </div>
                                            <div class="tab-pane" id="instrucoes">
                                                <div class="row">                                                        
                                                    <div class="form-group col-md-9 mx-auto">
                                                            <label for="Instruções">Instruções</label>
                                                            <textarea id="enunciado" type="text" class="form-control" name="instrucao" placeholder="Instruções...">{{ $avaliacao->instrucao }}</textarea>
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
