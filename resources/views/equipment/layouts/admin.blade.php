<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Bootstrap.CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://library.byui.edu/assets/css/main.css?id=7723330db7716c52a0d2">
    {{--<link rel="stylesheet" href="https://content.byui.edu/file/0af2f055-7202-403e-9894-bb80478aa98c/1/macLab.css">--}}
    
    <!-- Custom Theme Style -->
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/macLab.css') }}" rel="stylesheet">

    <style>
        body { padding: 0px; }
        nav li{ padding-top: 0px; }
        a { color: inherit; } 
        a.sidebar-btn { text-align: left; }
        #adminOpts { display: none; }
        #historyOpts { display: none; }
        #settingsOpts { display: none; }
        #menu { display: none; }
        #menuOpts { display: block; }

        @media only screen and (max-width: 767px) {
            #menu { display: block; }
            #menuOpts { display: none; }
        }
        footer{
            position: fixed;
            bottom: 0px;
        }
    </style>

    @stack('styles')

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap.JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @stack('header-scripts')

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 15px;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('equipment.admin') }}">Equipment Checkout</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li>
                        <a href="{{ route('3d.admin') }}">
                            <i class="fa fa-cube" aria-hidden="true"></i>
                            3D Printing
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right" style="margin-right: 0px !important;">
                    <li class="nav-item" style="line-height: 42px; margin-right: 20px;">
                        Welcome, {{ auth()->guard('web')->user()->first_name }}
                    </li>
                    <li class="nav-item">
                        {!! BootForm::open()->action(route('logout'))->post() !!}
                        {!! BootForm::submit('Logout')->class('btn warning') !!}
                        {!! BootForm::close() !!}
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 sidebar">

                <div class="clearfix">&nbsp;</div>
                <div class="clearfix">&nbsp;</div>

                @include('equipment.layouts.parts.sidebar')



            </div>



            <!-- page content -->
            <div class="main_col col-md" role="main">
                <div class="row light">
                    <div class="col-12">

                        @yield('banner')

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="x_title row mt-4">
                            <h2 class="col">@yield('title')</h2>

                        </div>

                        <div class="x_content row">

                            @yield('content')

                        </div>

                    </div>

                </div>
                <br />


            </div>


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="row container justify-content-end">
            <div class="col-4">
                {{ env('APP_NAME') }}
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

@stack('footer-scripts')



<script>

    $(function(){
        $('#admin').click(function() {
            $('#adminOpts').toggle('slow');
        });

        $('#history').click(function() {
            $('#historyOpts').toggle('slow');
        });

        $('#settings').click(function() {
            $('#settingsOpts').toggle('slow');
        });

        $('#menu').click(function() {
            $('#menuOpts').toggle('slow');
        });
    });
</script>


</body>
</html>