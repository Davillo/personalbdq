@extends('layouts.app')

@section('index','active')

@section('conteudo')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h5 class="title pt-2">Dashboard</h5>
            </div>

        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="table-responsive">
                    Seja bem-vindo, {{Auth::user()->nome}}
                </div>
            </div>
        </div>
    </div>
@endsection

