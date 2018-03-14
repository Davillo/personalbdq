<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PersonalBDQ</title>
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>



<header class="container-fluid">
    <div class="page-header">
        <div class="container">
            <nav class="navbar col-lg-12 navbar-dark navbar-transparent">
                <h2 class="logo">PersonalBDQ</h2>
                <button class="btn float-right btn-entrar" href="" data-toggle="modal" data-target="#myModal">Entrar</button>

            </nav>
        </div>
        <h1 class="text-center titulo">Gerencie seu banco de questões</h1>
        <p class="text-center titulo-descricao">Com o Personalbdq você poderá organizar todas suas questões de forma rapida e fácil,<br>
            assim não passando horas as procurando em seu computador ou internet</p>
    </div>
</header>
<!-- Termino Header -->

<!-- Main -->
<div class="container bg-white conteudo">
    <main>
        <div class="row">

            <div class="col-lg-12 col-md-6">
                <h1 class="text-center sobre" id="sobre">Sobre</h1>
                <p class="text-center sobre-descricao">Nossa platafoma disponibiliza inumeras funcionalidades para que sua experiência seja a melhor possivel,<br>
                    nossa missão principal é satisfazer a necessidade do cliente!!!
                </p>
            </div>
            <div class="col-lg-12 col-md-6">
                <h1 class="text-center funcionalidade" id="funcionaalidade">Funcionalidades</h1>
                <p class="text-center funcionalidade-descricao">Nossa platafoma disponibiliza inumeras funcionalidades para que sua experiência seja a melhor possivel,<br>
                    nossa missão principal é satisfazer a necessidade do cliente!!!</p>
            </div>
        </div>


        <div class="row mtop">
            <div class="col-md-4">
                <img class="image center-block" src="img/img1.png" alt="Thumbnail Image">
                <h4 class="text-center title">GERENCIE SUAS QUESTÕES</h4>

            </div>
            <div class="col-md-4">
                <img class="image center-block" src="img/img2.png" alt="Thumbnail Image">
                <h4 class="text-center title">GERENCIE SUAS LISTAS</h4>
            </div>
            <div class="col-md-4">
                <img class="image center-block" src="img/img3.png" alt="Thumbnail Image">
                <h4 class="text-center title">COMPARTILHE SUAS LISTAS</h4>


            </div>
        </div>


        <div class="row pb-4">
            <div class="col-lg-12">
                <h1 class="text-center sobre mb-5" id="contato">Alguma duvida?</h1>
                <h2 class="text-center mb-5" style="color:#575756;">Contato</h2>
            </div>
            <div class="col-lg-5 col-md-8 ml-auto mr-auto text-center">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="material-icons">perm_identity</i>
                                    </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nome...">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="material-icons">email</i>
                                    </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Email...">
                </div>
                <div class="textarea-container">
                    <textarea class="form-control" name="name" rows="4" cols="80" placeholder="Mensagem..."></textarea>
                </div>
                <div class="send-button mt-3">
                    <button href="" class="btn btn-primary float-right btn-enviar">Enviar</button>
                </div>
            </div>
        </div>
    </main>
    <!-- Termino Main -->

</div>
<!-- Footer -->
<footer>
    <!--Copyright-->
    <div class="container rodape">
        <span>© 2018 , Desenvolvido por QuallitySoft</span>
    </div>
    <!--/.Copyright-->
</footer>
<!-- Termino Footer -->


<!-- Modal  -->
@include('modals.modallogin')
@include('inc.errologin')

<!-- JQuery -->
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>


@if(isset($erro))
    <script>
        $(function(){
            $('#modalerro').modal('show');
        });
    </script>
@endif


</html>
