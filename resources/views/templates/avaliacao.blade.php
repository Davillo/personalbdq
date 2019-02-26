<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Avaliação</title>
                <style>
                    *{
                        font-family: 'Times New Roman', Times, serif;
                        font-size: 14px;
                    }
                    main{           
                        width: 100%;
                        height: 100vh;
                        background: #ffffff;
                    }
                    .instrucoes{
                        text-align: center;
                    }
            
                    .alternativa {
                        margin-top: 0;
                        margin-bottom: 0;
                    }
                    .questao p{
                        text-align: justify;
                    }
                    /*Cabeçalho*/
                    header table{
                        border-spacing: 0px 7px;
                        margin: 0 auto;
                        border: solid 1px #000;
                        width: 100%;    
                    }
                    header table td{
                        padding-left: 8px;
                        font-weight: bold;
                        font-size: 20px;
                        border: solid 1px #000;
                    }
                    header table tr td {
                        height: 40px;
                    }
                    /*Logo e Titulo*/
                    .td-logo, .td-inicio{
                        border-left: none;
                        border-right: none;
                    }
                    .titulo{
                        font-size: 22px;
                        text-align: center;
                    }
                    .img-logo{
                        float: left;
                        margin-top: 3px;
                        width: 200px;
                        height: 50px;
                    }
                    /*Demais*/

                    .td-inicio3{
                        border-left: none;
                    }
                    .td-meio{
                        width: 80px;
                    }
                    .td-espaco{
                        padding: 0;
                        width: 5px;
                        border: none;
                    }
                    .td-fim{
                        border-right: none;
                        width: 110px;
                    }
                    .dados-instrucoes{
                        margin-left: 25px;
                        text-align: left;                        
                    }
                    .dados-instrucoes > p, pre{
                        line-height: 0.5;
                    }
                    .pagebreak{
                        page-break-before: always;
                    }
                </style>
            </head>
            <body>
                <header>
                    <table>
                        @if(isset($avaliacao->logo) || isset($avaliacao->instituicao))
                        <tr>
                            <td class="td-logo" colspan="5">
                                @isset($avaliacao->logo)<img class="img-logo" src="{{ public_path("$avaliacao->logo")}}" alt="BTS">@endisset
                                @isset($avaliacao->instituicao)<h1 class="titulo">{{$avaliacao->instituicao}}</h1>@endisset
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td class="td-inicio" colspan="5">Nome: </td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio" colspan="5">Professor (a): @isset($avaliacao->professor){{$avaliacao->professor}}@endisset</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Curso: @isset($avaliacao->curso){{$avaliacao->curso}}@endisset </td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">Turma:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim">@isset($avaliacao->turma){{$avaliacao->turma}}@endisset</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Disciplina: @isset($avaliacao->disciplina){{$avaliacao->disciplina}}@endisset</td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">AV:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim">@isset($avaliacao->avaliacao){{$avaliacao->avaliacao}}@endisset</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Data: ___ /___ /______</td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">Nota:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim"></td>
                        </tr>
                        
                    </table>
                </header>
                <div>
                    @isset($avaliacao->instrucao)
                        <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;">LEIA COM ATENÇÃO AS INSTRUÇÕES:</h1>
                        <div class="dados-instrucoes">    
                            {!! $avaliacao->instrucao !!}
                        </div>
                    @endisset
                    <h2 class="instrucoes" style="margin-top:30px;margin-bottom:20px;">Gabarito</h2>
                    <table  style="margin: 0 auto;border-collapse:collapse;">
                        <tr>
                            @for ($i = 0; $i < count($questoes); $i++)
                                <td style="width:50px;height:30px;text-align:center;font-size:20px;">{{$i+1}}</td>
                            @endfor
                        </tr>
                        <tr>
                            @foreach ($questoes as $index => $questao)
                                @if($questao->tipo == "Múltipla Escolha" || $questao->tipo == "Asserção Razão" || $questao->tipo == "Verdadeiro ou Falso")
                                <td style="width:50px;height:30px;border:1px solid #000;"></td>
                                @else
                                <td style="width:50px;height:30px;border:1px solid #000;background-color:#131B23;"></td>
                                @endif
                            @endforeach
                        </tr>
                    </table>
                </div>

                <main>
                    <div class="instrucoes">
                            <h1 style="margin-top:40px;margin-bottom:20px;">@isset($avaliacao->titulo){{$avaliacao->titulo}}@endisset</h1>
                    </div>
                    @foreach($questoes as $index => $questao)
                    <div class="questao">
                    
                        <table >
                            <tr>
                                <td style="vertical-align:baseline;">{{ $index+1 }}.</td>
                                <td style="vertical-align:baseline;">{!! $questao->enunciado !!}</td>
                            </tr>
                            
                        @if($questao->tipo == 'Múltipla Escolha' || $questao->tipo == 'Asserção Razão' || $questao->tipo == 'Verdadeiro ou Falso')
                            
                                    <?php $count = 0; ?>
                                    @foreach($alternativas as $alternativa )
                                        @if($alternativa->questao_id == $questao->id)       
                                           @if($count == 0) 
                                                <tr>
                                                    <td></td>
                                                    <td><p class="alternativa">a) {{$alternativa->enunciado}}</p></td>
                                                </tr>
                                           @endif
                                           @if($count == 1) 
                                                <tr>
                                                    <td></td>
                                                    <td><p class="alternativa">b) {{$alternativa->enunciado}}</p></td>
                                                </tr>
                                           @endif
                                           @if($count == 2) 
                                                <tr>
                                                    <td></td>
                                                    <td><p class="alternativa">c) {{$alternativa->enunciado}}</p></td>
                                                </tr>
                                           @endif
                                           @if($count == 3) 
                                                <tr>
                                                    <td></td>
                                                    <td><p class="alternativa">d) {{$alternativa->enunciado}}</p></td>
                                                </tr>
                                           @endif
                                           @if($count == 4) 
                                                <tr>
                                                    <td></td>
                                                    <td><p class="alternativa">e) {{$alternativa->enunciado}}</p></td>
                                                </tr>
                                           @endif
                                           
                                           <?php $count = $count+1; ?>    
                                        @endif                            
                                    @endforeach
                        @else
                            @for ($i = 0; $i < $questao->quantidadeLinhas; $i++)
                                <tr>
                                    <td colspan="2" style="padding-bottom: 10px;">
                                        <hr/>
                                    </td>
                                </tr>
                            @endfor
                        @endif
                        </table>
                    </div>
                    @endforeach
                </main>

                <div class="pagebreak"></div>

                <header>
                    <table>
                        @if(isset($avaliacao->logo) || isset($avaliacao->instituicao))
                        <tr>
                            <td class="td-logo" colspan="5">
                                @isset($avaliacao->logo)<img class="img-logo" src="{{ public_path("$avaliacao->logo")}}" alt="BTS">@endisset
                                @isset($avaliacao->instituicao)<h1 class="titulo">{{$avaliacao->instituicao}}</h1>@endisset
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td class="td-inicio" colspan="5">Nome: </td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio" colspan="5">Professor (a): @isset($avaliacao->professor){{$avaliacao->professor}}@endisset</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Curso: @isset($avaliacao->curso){{$avaliacao->curso}}@endisset </td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">Turma:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim">@isset($avaliacao->turma){{$avaliacao->turma}}@endisset</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Disciplina: @isset($avaliacao->disciplina){{$avaliacao->disciplina}}@endisset</td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">AV:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim">@isset($avaliacao->avaliacao){{$avaliacao->avaliacao}}@endisset</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Data: ___ /___ /______</td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">Nota:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim"></td>
                        </tr>
                        
                    </table>
                </header>
                <div>
                    @isset($avaliacao->instrucao)
                        <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;">LEIA COM ATENÇÃO AS INSTRUÇÕES:</h1>
                        <div class="dados-instrucoes">    
                            {!! $avaliacao->instrucao !!}
                        </div>
                    @endisset
                    <h2 class="instrucoes" style="margin-top:30px;margin-bottom:20px;">Gabarito</h2>
                    <table  style="margin: 0 auto;border-collapse:collapse;">
                        <tr>
                            @for ($i = 0; $i < count($questoes); $i++)
                                <td style="width:50px;height:30px;text-align:center;font-size:20px;">{{$i+1}}</td>
                            @endfor
                        </tr>
                        <tr>
                            @foreach ($questoes as $index => $questao)
                                @if($questao->tipo == "Múltipla Escolha" || $questao->tipo == "Asserção Razão" || $questao->tipo == "Verdadeiro ou Falso")
                                <td style="width:50px;height:30px;border:1px solid #000;text-align:center;">
                                        <?php $count = 0; ?>
                                        @foreach($alternativas as $alternativa )
                                            @if($alternativa->questao_id == $questao->id)       
                                                @if($alternativa->correta == true)
                                                    @if($count == 0) 
                                                            A
                                                    @endif
                                                    @if($count == 1) 
                                                            B
                                                    @endif
                                                    @if($count == 2) 
                                                            C
                                                    @endif
                                                    @if($count == 3) 
                                                            D
                                                    @endif
                                                    @if($count == 4) 
                                                            E
                                                    @endif
                                                @endif
                                               
                                               <?php $count = $count+1; ?>    
                                            @endif                            
                                        @endforeach
                                </td>
                                @else
                                <td style="width:50px;height:30px;border:1px solid #000;background-color:#131B23;"></td>
                                @endif
                            @endforeach
                        </tr>
                    </table>
                </div>

                <main>
                    <div class="instrucoes">
                            <h1 style="margin-top:40px;margin-bottom:20px;">@isset($avaliacao->titulo){{$avaliacao->titulo}}@endisset</h1>
                    </div>
                    @foreach($questoes as $index => $questao)
                    <div class="questao">
                    
                        <table >
                            <tr>
                                <td style="vertical-align:top; padding-top:18px;">{{ $index+1 }}.</td>
                                <td>{!! $questao->enunciado !!}</td>
                            </tr>
                            
                        @if($questao->tipo == 'Múltipla Escolha' || $questao->tipo == 'Asserção Razão' || $questao->tipo == 'Verdadeiro ou Falso')
                            
                                    <?php $count = 0; ?>
                                    @foreach($alternativas as $alternativa )
                                        @if($alternativa->questao_id == $questao->id)       
                                           @if($count == 0) 
                                                @if($alternativa->correta == true)
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa"><span style="background-color: #00FA9A">a</span>) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa">a) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @endif
                                           @endif
                                           @if($count == 1) 
                                                @if($alternativa->correta == true)
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa"><span style="background-color: #00FA9A">b</span>) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa">b) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @endif
                                           @endif
                                           @if($count == 2) 
                                                @if($alternativa->correta == true)
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa"><span style="background-color: #00FA9A">c</span>) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa">c) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @endif
                                           @endif
                                           @if($count == 3) 
                                                @if($alternativa->correta == true)
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa"><span style="background-color: #00FA9A">d</span>) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa">d) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @endif
                                           @endif
                                           @if($count == 4) 
                                                @if($alternativa->correta == true)
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa"><span style="background-color: #00FA9A">e</span>) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td></td>
                                                        <td><p class="alternativa">e) {{$alternativa->enunciado}}</p></td>
                                                    </tr>
                                                @endif
                                           @endif
                                           
                                           <?php $count = $count+1; ?>    
                                        @endif                            
                                    @endforeach
                            @else
                            <tr>
                                <td style="vertical-align:baseline;">R</td>
                                <td style="vertical-align:baseline;"> - {!! $questao->resposta !!}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    @endforeach
                </main>

            </body>
</html>