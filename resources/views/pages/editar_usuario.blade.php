@extends('layouts.app')

@section('musuario','active')

@section('conteudo')
<div class="card-header">
    <div class="row">
        <div class="col-md-4">
            <h5 class="title pt-2">Usuarios</h5>
        </div>

        <div class="col-md-8 pr-5">
            <a class="float-right" href="/usuario">
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
            <form method="POST" action="/usuario/update">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$usuario->id}}">
                <h3 class="title text-center mb-1" id="novoModalLabel">Editar Usuario</h3>

                <div class="modal-body">
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Matrícula">Matrícula<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                     
                            <input type="text" value="{{$usuario->matricula}}" class="form-control borda-input" name="matricula" placeholder="Matricula...">
                        </div>
                    </div>
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Nome">Nome<span class="text-danger f-16" title="Campo obrigatório">*</span></label> 
                            <input type="text" value="{{$usuario->nome}}" class="form-control borda-input" name="nome" placeholder="Nome..." >
                        </div>
                    </div>
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Email">Email<span class="text-danger f-16" title="Campo obrigatório">*</span></label> 
                            <input value="{{$usuario->email}}" type="email" class="form-control borda-input" name="email" placeholder="Email...">
                        </div>
                    </div>
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Senha">Senha<span class="text-danger f-16" title="Campo obrigatório">*</span></label>
                            <input type="password" class="form-control borda-input" name="senha" placeholder="Senha...">
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

