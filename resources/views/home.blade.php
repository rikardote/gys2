<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <title>Sistema Guardias y Suplencias</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    
     <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/jquery-bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootswatch/cosmo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flotante.css') }}">

    @include('partials.nav')

    <section>
        <div class="container">
             <div class="row">
                <div class="col-md-10 col-md-offset-1">
                        @include('layouts.errors')
                    @yield('content')
               </div>
            </div>
        </div>
    </section>
</head>
<body>

</body>

 <!-- JavaScripts -->
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    
    <script src="{{ asset('plugins/datepicker/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/ui.datepicker-es-MX.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/extensions/Buttons/js/buttons.flash.min.js') }}"></script>
    @yield('js')

</html>