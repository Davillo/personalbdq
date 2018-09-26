@extends('layouts.app')

@section('mavaliacoes','active')

@section('conteudo')
    
                        <v-questoesavaliacao questoes="{{$questoes}}" questoesjaadd="{{$questoesjaadd}}" avaliacao="{{$avaliacao}}"></v-questoesavaliacao>

                        @foreach($questoes as $questao)
                           @include('modals.modal_visualizar_questao_avaliacao')
                        @endforeach

        
@endsection

<!-- Modal  -->
