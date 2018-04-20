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

                    <h3 class="title text-center mb-1" id="novoModalLabel">Novo Curso</h3>

                    <div class="modal-body">
                        <div class="row">
                            <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="material-icons">subtitles</i>
                                    </span>
                                </div>
                                <input type="hidden" class="form-control" value="{{ $curso->id }}" name="id" required>
                                <input type="text" class="form-control" value="{{ $curso->nome }}" name="nome" placeholder="Nome do curso" required>

                                </div>
                        </div>
                        <div class="row">
                            <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                </div>
                                {{csrf_field()}}

                                <select class="form-control" name="tipo" required>
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

                        <div class="text-center" style="margin-bottom: 10px;">
                            <input type="submit" id="atualizar" name="editar" class="btn btn-modal col-sm-8" value="Atualizar"><br>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
