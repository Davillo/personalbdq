<!DOCTYPE html>
<html lang="pt">


<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PersonalBDQ - Painel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons
     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://code.google.com/p/stringencoders/source/browse/trunk/javascript/base64.js?r=230">
    <!-- CSS Files -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/now-ui-dashboard.css?v=1.0.1')}}" rel="stylesheet" />
    <!-- Custom -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="">
<div class="wrapper " id="app">

        @include('inc.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('inc.navbar')

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    @include('inc.messages')
                    @yield('conteudo')

                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">


                <div class="copyright">
                   Desenvolvido pela &copy;QuallitySoft
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->

<script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<script type="text/javascript" src="{{asset('/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Chart JS -->
<!--<script src="../assets/js/plugins/chartjs.min.js"></script>-->
<!--  Notifications Plugin    -->
<!--<script src="../assets/js/plugins/bootstrap-notify.js"></script>-->
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script type="text/javascript" src="{{asset('/js/now-ui-dashboard.js?v=1.0.1')}}"></script>
<!--<script src="../assets/demo/demo.js"></script>-->
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}" charset="utf-8"></script>
<script>
    let options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    language: 'pt-br',
    filebrowserUploadUrl: null, // desabilitar a guia de upload 
    filebrowserImageUploadUrl: null, // desabilitar o upload da guia 
    filebrowserFlashUploadUrl: null, // disable tab de upload
    uiColor: '#fd7e14',
    width: "100%",
    height: 300,
    entities_latin: false,
    };
    CKEDITOR.replace('enunciado',options);

    CKEDITOR.on('dialogDefinition', function( ev )
   {
      // Take the dialog name and its definition from the event
      // data.
      var dialogName = ev.data.name;
      var dialogDefinition = ev.data.definition;

      // Check if the definition is from the dialog we're
      // interested on (the 'Image' dialog).
      if ( dialogName == 'image' )
      {

         // Get a reference to the 'Image Info' tab.
         var infoTab = dialogDefinition.getContents( 'info' );

         // Remove unnecessary widgets from the 'Image Info' tab.         
         infoTab.remove( 'txtAlt');
      }
   });
</script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>$('#lfm').filemanager('image');</script>
</body>
</html>
