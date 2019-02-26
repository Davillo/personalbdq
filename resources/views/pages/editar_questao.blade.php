@extends('layouts.app')

@section('mquestoes','active')

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
                <form method="POST" id="dados" action="/questao/update">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" value="{{$questao->id }}" name="id">

                    @if(isset($lista_id))
                    <input type="hidden" class="form-control" value="{{$lista_id }}" name="lista_id">
                    @endif

                    <h3 class="title text-center mb-1" id="novoModalLabel">Atualizar Questão</h3>

                    <div class="modal-body">

                        <div class="row">                                                        
                             <div class="form-group col-md-9 mx-auto">
                                <label for="Tipo de questão">Tipo de questão<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                 
                                <select @change="getForm" name="tipo" class="form-control borda-input" disabled>
                                    <option value="{{$questao->tipo}}">{{$questao->tipo}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Categoria">Categoria<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                                                          
                                <select name="categoria" class="form-control borda-input">
                                    <option value="">Categoria...</option>
                                    @if($questao->categoria == 'Avaliação 1')
                                        <option value="Avaliação 1" selected>Avaliação 1</option>
                                        <option value="Avaliação 2" >Avaliação 2</option>
                                        <option value="Enade" >Enade</option>
                                    @elseif($questao->categoria == 'Avaliação 2')
                                    <option value="Avaliação 1" >Avaliação 1</option>
                                    <option value="Avaliação 2" selected>Avaliação 2</option>
                                    <option value="Enade" >Enade</option>
                                    @else
                                        <option value="Avaliação 1" >Avaliação 1</option>
                                        <option value="Avaliação 2" >Avaliação 2</option>
                                        <option value="Enade" selected>Enade</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Dificuldade">Dificuldade<span class="text-danger f-16" title="Campo obrigatório">*</span></label>                                                                                                                                              
                                <select name="dificuldade"  class="form-control borda-input">
                                    <option value="">Dificuldade...</option>
                                    @if($questao->dificuldade == 'Fácil')
                                        <option value="Fácil" selected>Fácil</option>
                                        <option value="Intermediário">Intermediário</option>
                                        <option value="Difícil">Difícil</option>
                                    @elseif($questao->dificuldade == 'Intermediário')
                                    <option value="Fácil">Fácil</option>
                                    <option value="Intermediário" selected>Intermediário</option>
                                    <option value="Difícil">Difícil</option>
                                    @else
                                        <option value="Fácil">Fácil</option>
                                        <option value="Intermediário">Intermediário</option>
                                        <option value="Difícil" selected>Difícil</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Palavras Chave">Palavras Chave<span class="text-danger f-16" title="Campo obrigatório">*</span></label>    
                                <input type="text" value="{{$questao->palavras_chave}}" class="form-control borda-input" name="palavras_chave" placeholder="Palavras chaves..." />
                            </div>
                        </div>


                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Enunciado">Enunciado<span class="text-danger f-16" title="Campo obrigatório">*</span></label>
                                <textarea type="text" class="form-control" name="enunciado" placeholder="Enunciado..." >{{$questao->enunciado}}</textarea>
                            </div>
                        </div>

                        @if($questao->tipo == "Múltipla Escolha" || $questao->tipo == "Asserção Razão" || $questao->tipo == "Verdadeiro ou Falso")
                            <div class="mt-3">                                
                                <div class="row">                                                        
                                    <div class="form-group col-md-8 mx-auto">
                                        <label for="Alternativas">Alternativas</label> 
                                    </div>   
                                </div>

                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                A
                                            </span>
                                        </div>
                                        @if(isset($alternativas[0]))
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                @if($alternativas[0]->correta == true)
                                                    <input type="radio" name="correta" value="1" checked>
                                                @else
                                                    <input type="radio" name="correta" value="1">
                                                @endif
                                            </span>
                                        </div>
                                        <textarea type="text" class="form-control" name="enunciado_alternativa1" placeholder="Alternativa...">{{$alternativas[0]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="1">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa1" placeholder="Alternativa..."></textarea>
                                         @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                B
                                            </span>
                                        </div>
                                        @if(isset($alternativas[1]))
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                @if($alternativas[1]->correta == true)
                                                    <input type="radio" name="correta" value="2" checked>
                                                @else
                                                    <input type="radio" name="correta" value="2">
                                                @endif
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa2" placeholder="Alternativa...">{{$alternativas[1]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="2">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa2" placeholder="Alternativa..."></textarea>
                                        @endif</div>
                                </div>
                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                C
                                            </span>
                                        </div>
                                        @if(isset($alternativas[2]))
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                @if($alternativas[2]->correta == true)
                                                    <input type="radio" name="correta" value="3" checked>
                                                @else
                                                    <input type="radio" name="correta" value="3">
                                                @endif
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa3" placeholder="Alternativa...">{{$alternativas[2]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="3">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa3" placeholder="Alternativa..."></textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                D
                                            </span>
                                        </div>
                                        @if(isset($alternativas[3]))
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                @if($alternativas[3]->correta == true)
                                                    <input type="radio" name="correta" value="4" checked>
                                                @else
                                                    <input type="radio" name="correta" value="4">
                                                @endif
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa4" placeholder="Alternativa...">{{$alternativas[3]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="4">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa4" placeholder="Alternativa..."></textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                E
                                            </span>
                                        </div>
                                        @if(isset($alternativas[4]))
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                @if($alternativas[4]->correta == true)
                                                    <input type="radio" name="correta" value="5" checked>
                                                @else
                                                    <input type="radio" name="correta" value="5">
                                                @endif
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa1" placeholder="Alternativa...">{{$alternativas[4]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="5">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa5" placeholder="Alternativa..."></textarea>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Resposta">Resposta<span class="text-danger f-16" title="Campo obrigatório">*</span></label>
                                <textarea id="resposta" type="text" class="form-control" name="resposta" placeholder="Resposta da quetão...">{{$questao->resposta}}</textarea>
                            </div>
                        </div>
                        <div class="row">                                                        
                            <div class="form-group col-md-9 mx-auto">
                                <label for="Quantidade de linahs">Quantidade de linhas<span class="text-danger f-16" title="Campo obrigatório">*</span></label>
                                <input value="{{$questao->quantidadeLinhas}}" id="quantidadeLinhas" type="number" min="1" max="15" class="form-control borda-input" name="quantidadeLinhas" placeholder="Quantidade de linhas..." />
                            </div>
                        </div>
                        @endif
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
