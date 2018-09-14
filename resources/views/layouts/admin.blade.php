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

    <link rel="stylesheet" href="https://content.byui.edu/file/0af2f055-7202-403e-9894-bb80478aa98c/1/macLab.css">
    
    <!-- Custom Theme Style -->
    <link href="/css/custom.css" rel="stylesheet">

    <style>
        body { padding: 30px; }
    </style>
    @stack('styles')

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap.JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container row">
        <div class="col-md-2 left_col sidebar">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ route('admin') }}" class="site_title"><span></span></a>
                </div>

                <div class="clearfix"></div>

                <br />

                @include('layouts.parts.sidebar')


            </div>
        </div>



        <!-- page content -->
        <div class="right_col col-md-8" role="main">


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 class="pull-left">@yield('title')</h2>
                            

                            <div class="clearfix"></div>

                        </div>
                        <div class="x_content row">
                            <br>

                            @yield('content')

                        </div>
                    </div>
                </div>

            </div>
            <br />


                    </div>
                </div>
            </div>


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="row">
            <div class="pull-right">
                {{ env('APP_NAME') }}
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


@stack('custom-scripts')



<script>

    $(function(){

    });
</script>


</body>
</html>