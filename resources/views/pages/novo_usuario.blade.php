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
            <form method="POST" @submit="getCheckUsuario" id="dados" action="/usuario/inserir">
                {{ csrf_field() }}
                <h3 class="title text-center mb-1" id="novoModalLabel">Novo Usuario</h3>

                <div class="modal-body">
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Matrícula">Matrícula<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                     
                            <input v-model.trim="matriculaUsuario" type="text" class="form-control borda-input" name="matricula" placeholder="Matricula..." id="matricula">
                            <label v-if="errors.matriculaUsuario" class="text-danger" v-cloak>@{{errors.matriculaUsuario}}</label>
                        </div>
                    </div>
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Nome">Nome<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                       
                            <input v-model.trim="nomeUsuario" type="text" class="form-control borda-input" name="nome" placeholder="Nome..." id="nome">
                            <label v-if="errors.nomeUsuario" class="text-danger" v-cloak>@{{errors.nomeUsuario}}</label>
                        </div>
                    </div>
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Email">Email<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                       
                            <input @change="verificarEmail" v-model.trim="emailUsuario" type="email" class="form-control borda-input" name="email" placeholder="Email..." id="email">
                            <label v-if="errors.emailUsuario" class="text-danger" v-cloak>@{{errors.emailUsuario}}</label>
                        </div>
                    </div>
                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Senha">Senha<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                       
                            <input v-model.trim="senhaUsuario" type="password" class="form-control borda-input" name="senha" placeholder="Senha..." id="senha">
                            <label v-if="errors.senhaUsuario" class="text-danger" v-cloak>@{{errors.senhaUsuario}}</label>
                        </div>
                    </div>

                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Tipo de Usuário">Tipo de Usuário<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                   
                                <select name="type" class="form-control borda-input">
                                    <option value="">Selecione o tipo de usuário...</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Coordenador">Coordenador</option>
                                </select>
                        </div>
                    </div>

                    <div class="row">                                                        
                        <div class="form-group col-md-9 mx-auto">
                            <label for="Curso">Curso<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                   
                            @if(count($cursos)>0)
                                <select v-model="cursoUsuario" name="curso_id" class="form-control borda-input">
                                    <option value="" disabled>Selecione o curso...</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                    @endforeach
                                </select>
                                <label class="text-warning" for="Não existe cursos">Obs: se não houver cursos cadastrados, por favor cadastre um curso antes de continuar</label><br>
                            @endif
                            <label v-if="errors.cursoUsuario" class="text-danger" v-cloak>@{{errors.cursoUsuario}}</label>
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

