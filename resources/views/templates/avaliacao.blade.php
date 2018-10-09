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
                        font-size: 18px;
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
                        width: 900px;    
                    }
                    header table td{
                        padding-left: 8px;
                        font-weight: bold;
                        font-size: 20px;
                        border: solid 1px #000;
                    }
                    /*Logo e Titulo*/
                    .td-logo, .td-inicio{
                        border-left: none;
                        border-right: none;
                    }
                    .titulo{
                        font-size: 28px;
                        text-align: center;
                    }
                    .img-logo{
                        float: left;
                        margin-top: 10px;
                        width: 170px;
                        height: 40px;
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
                </style>
            </head>
            <body>
                <header>
                    <table>
                        <tr>
                            <td class="td-logo" colspan="5">
                                <img class="img-logo" src="{{ public_path('img/logo.png')}}" alt="BTS">
                                <h1 class="titulo">Unidade de Ensino Crajubar</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-inicio" colspan="5">Nome:</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio" colspan="5">Professor (a):</td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Curso: </td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">Turma:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim"></td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Disciplina:</td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">AV:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim"></td>
                        </tr>
                        
                        <tr>
                            <td class="td-inicio3">Data:</td>
                            <td class="td-espaco"></td>
                            <td class="td-meio">Nota:</td>
                            <td class="td-espaco"></td>
                            <td class="td-fim"></td>
                        </tr>
                        
                    </table>
                </header>
                <div class="instrucoes">
                    <h3>Gabarito</h3>
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
                            <h3>AV1 - 2017.2</h3>
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
                            @endif
                        </table>
                    </div>
                    @endforeach
                </main>
            </body>
</html>