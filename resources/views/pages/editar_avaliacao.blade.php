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

                    <h3 class="title text-center mb-1" id="novoModalLabel">Editar Curso</h3>

                    <div class="modal-body">
                        <div class="row">
                            <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="material-icons">subtitles</i>
                                    </span>
                                </div>
                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" value="{{ $avaliacao->id }}" name="id" >
                                <input type="text" class="form-control" value="{{ $avaliacao->titulo }}" name="titulo" placeholder="Titulo avaliação">

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
