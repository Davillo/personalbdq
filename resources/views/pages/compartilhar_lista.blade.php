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
                <form method="POST" id="form_compartilhar" action="/lista/compartilhar">
                    {{ csrf_field() }}
                    <h3 class="title text-center mb-1" id="novoModalLabel">Compartilhar Lista</h3>

                    <div class="modal-body">
                        <div class="row">
                            <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">

                                </span>
                                </div>
                                <input type="hidden" name="id" value="{{$lista->id}}"/>
                                <input type="text" class="form-control" name="email" placeholder="Email do usuário">

                            </div>
                        </div>

                        <div class="text-center" style="margin-bottom: 10px;">
                            <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-modal col-sm-8" value="Compartilhar"><br>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
