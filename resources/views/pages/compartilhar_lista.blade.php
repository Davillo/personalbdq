@extends('layouts.app')

@section('mcurso','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Listas</h5>
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
                <form method="POST" @submit="getCheckCompartilhar" id="form_compartilhar" action="/lista/compartilhar">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$lista->id}}"/>
                    <h3 class="title text-center mb-1" id="novoModalLabel">Compartilhar Lista</h3>

                    <div class="modal-body">
                        <div class="row">                        
                                <div class="form-group col-md-9 mx-auto">
                                    <label for="Email do usuário">Email do usuário<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                            
                                    <input v-model="emailCompartilhar" type="text" class="form-control borda-input" name="email" placeholder="Email do usuário">
                                    <label v-if="errors.emailCompartilhar" class="text-danger" v-cloak>@{{errors.emailCompartilhar}}</label>                                                        
                                </div>                                                                                                     
                        </div>
                        <div class="row">
                                <div class="col-md-9 mx-auto" style="margin-bottom: 10px;">
                                    <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-md-2 text-center float-right mr-2" value="Compartilhar"><br>
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
