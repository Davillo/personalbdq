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
                <form method="POST" action="/curso/update">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" value="{{ $curso->id }}" name="id" >
                              
                    <h3 class="title text-center mb-1" id="novoModalLabel">Editar Curso</h3>

                    <div class="modal-body">
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Nome do curso">Nome do curso<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                       
                                <input type="text" class="form-control borda-input" value="{{ $curso->nome }}" name="nome" placeholder="Nome do curso">
                            </div>
                        </div>
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Tipo do curso">Tipo do curso<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                                                                    
                                <select class="form-control borda-input" name="tipo">
                                    <option value="">Selecione o tipo...</option>
                                    @if($curso->tipo == "BACHAREL")
                                        <option value="BACHAREL" selected>Bacharel</option>
                                        <option value="LICENCIATURA">Licenciatura</option>
                                        <option value="TECNÓLOGO">Tecnólogo</option>
                                    @elseif($curso->tipo == "LICENCIATURA")
                                        <option value="BACHAREL">Bacharel</option>
                                        <option value="LICENCIATURA" selected>Licenciatura</option>
                                        <option value="TECNÓLOGO">Tecnólogo</option>
                                    @elseif($curso->tipo == "TECNÓLOGO")
                                        <option value="BACHAREL">Bacharel</option>
                                        <option value="LICENCIATURA">Licenciatura</option>
                                        <option value="TECNÓLOGO" selected>Tecnólogo</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9 mx-auto" style="margin-bottom: 10px;">                                    
                                <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-md-2 text-center float-right mr-2" value="Atualizar"><br>
                            </div>                      
                        </div>                     
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
