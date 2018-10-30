@extends('layouts.app')

@section('mlistas','active')

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
                <form method="POST" id="dados" action="/lista/update">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" value="{{$lista->id }}" name="id">

                    <h3 class="title text-center mb-1" id="novoModalLabel">Editar Lista</h3>

                    <div class="modal-body">
                            <div class="row">                        
                                <div class="form-group col-md-9 mx-auto">
                                    <label for="Nome">Nome<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                            
                                    <input value={{$lista->nome}} type="text" class="form-control borda-input" name="nome" placeholder="Nome..." id="nome">                                                
                                </div>                                                       
                            </div>
                            <div class="row">                        
                                    <div class="form-group col-md-9 mx-auto">
                                        <label for="Descrição">Descrição<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                
                                        <textarea  class="form-control borda-input" name="descricao" placeholder="Descrição..." id="descricao" maxlength="255">{{ $lista->descricao}}</textarea>
                                   </div>                                                       
                            </div>                          
                    </div>
                    <div class="row">
                            <div class="col-md-9 mx-auto" style="margin-bottom: 10px;">
                                <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-md-2 text-center float-right mr-2" value="Atualizar"><br>
                            </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
@endsection

