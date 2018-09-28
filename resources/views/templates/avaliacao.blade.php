<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
        }
        body{
            background: rgb(82, 86, 89);
            margin: 0;
            padding: 0;
            padding-top: 50px;
        }
        main{           
            margin: 0 auto;
            padding-top: 40px;
            width: 793px;
            height: 100%;
            background: #ffffff;
        }
        header{
            display: flex;
            margin-left: 40px;
            margin-right: 40px;
            flex-direction: column;
            flex-grow: 1;
            height: 210px;
            border: solid 1px #000; 
        }
        table{
            border-collapse: collapse;
        }
        td{
            padding-top: 3px;
            padding-left: 10px;
        }
        .borda1{
            border-top: solid 1px #000;
            border-bottom: solid 1px #000;
        }
        .borda2{
            border: solid 1px #000;
            border-left: 0;
        }
        .borda3{
            border: solid 1px #000;
            width: 60px;
            margin-left: 5px;
            margin-right: 5px;
        }
        .borda4{
            border: solid 1px #000;
            border-right: 0;
            width: 90px;
        }
        .td-cabecalho{
            height: 60px;
            border-top: solid 1px #000;
            border-bottom: solid 1px #000;
        }
        .td-espacamento{
            margin: 0;
            padding: 0;
            width: 5px;
        }
        .instrucoes{
            text-align: center;
        }
        .questao{
            padding: 8px;
            text-align: justify;
        }
        .alternativa {
            margin-top: 0;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <main>
        <header>
            <table>
                <thead>
                    <tr><td></td></tr>
                    <tr class="as">
                        <td class="td-cabecalho" colspan="6">Unidade de Ensino Crajubar</td>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <tr><td></td></tr>
                        <td class="borda1" colspan="6">Nome: </td>
                    </tr>
                    <tr>
                        <tr><td></td></tr>
                        <td class="borda1" colspan="6">Professor (a):</td>
                    </tr>
                    <tr>
                        <tr><td></td></tr>
                        <td class="borda2">Curso:</td>
                        <td class="td-espacamento"></td>
                        <td class="borda3">Turma:</td>
                        <td class="td-espacamento"></td>
                        <td class="borda4"></td>
                    </tr>
                    <tr>
                        <tr><td></td></tr>
                        <td class="borda2">Disciplina:</td>
                        <td class="td-espacamento"></td>
                        <td class="borda3">AV:</td>
                        <td class="td-espacamento"></td>
                        <td class="borda4"></td>
                    </tr>
                    <tr>
                        <tr><td></td></tr>
                        <td class="borda2">Data:</td>
                        <td class="td-espacamento"></td>
                        <td class="borda3">Nota:</td>
                        <td class="td-espacamento"></td>
                        <td class="borda4"></td>
                    </tr>
                </tbody>
            </table>
        </header>
    
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