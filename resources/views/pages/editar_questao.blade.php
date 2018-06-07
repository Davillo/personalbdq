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
                    <input type="hidden" class="form-control" value="{{$questao->id }}" name="id">

                    @if(isset($lista_id))
                    <input type="hidden" class="form-control" value="{{$lista_id }}" name="lista_id">
                    @endif

                    <h3 class="title text-center mb-1" id="novoModalLabel">Atualizar Questão</h3>

                    <div class="modal-body">

                        <div class="row">
                            <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
                                </div>
                                {{csrf_field()}}

                                <select @change="getForm" name="tipo" class="form-control" disabled>
                                    <option value="{{$questao->tipo}}">{{$questao->tipo}}</option>
                                </select>
                            </div>
                        </div>

                        @if($questao->tipo == "Múltipla Escolha" || $questao->tipo == "Asserção Razão" || $questao->tipo == "Verdadeiro ou Falto")
                            <div>
                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
                                        </div>


                                        <select name="categoria" class="form-control">
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
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
                                        </div>

                                        <select name="dificuldade"  class="form-control">
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
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        Palavras Chave:
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <input type="text" value="{{$questao->palavras_chave}}" class="form-control" name="palavras_chave" placeholder="Palavras chaves..." />
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        Enunciado:
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <textarea type="text" class="form-control" name="enunciado" placeholder="Enunciado..." >{{$questao->enunciado}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        Alternativas:
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
                                        <textarea type="text" class="form-control" name="enunciado_alternativa1" placeholder="Matricula...">{{$alternativas[0]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="1">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa1" placeholder="Matricula..."></textarea>
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
                                            <textarea type="text" class="form-control" name="enunciado_alternativa2" placeholder="Matricula...">{{$alternativas[1]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="2">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa2" placeholder="Matricula..."></textarea>
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
                                            <textarea type="text" class="form-control" name="enunciado_alternativa3" placeholder="Matricula...">{{$alternativas[2]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="3">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa3" placeholder="Matricula..."></textarea>
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
                                            <textarea type="text" class="form-control" name="enunciado_alternativa4" placeholder="Matricula...">{{$alternativas[3]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="4">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa4" placeholder="Matricula..."></textarea>
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
                                            <textarea type="text" class="form-control" name="enunciado_alternativa1" placeholder="Matricula...">{{$alternativas[4]->enunciado}}</textarea>
                                        @else
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                                    <input type="radio" name="correta" value="5">
                                            </span>
                                            </div>
                                            <textarea type="text" class="form-control" name="enunciado_alternativa5" placeholder="Matricula..."></textarea>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @else

                            <div>
                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
                                        </div>


                                        <select name="categoria" class="form-control">
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
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
                                        </div>

                                        <select name="dificuldade"  class="form-control">
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
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        Palavras Chave:
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <input type="text" value="{{$questao->palavras_chave}}" class="form-control" name="palavras_chave" placeholder="Palavras chaves..."/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        Enunciado:
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                        <textarea type="text" class="form-control" name="enunciado" placeholder="Enunciado...">{{$questao->enunciado}}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="text-center" style="margin-bottom: 10px;">
                        <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-sm-8" value="Atualizar"><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
