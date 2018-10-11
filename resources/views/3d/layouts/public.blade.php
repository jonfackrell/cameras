<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="/printing/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/printing/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/printing/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/printing/css/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/printing/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/printing/css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/printing/css/daterangepicker.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="/printing/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/printing/css/custom.min.css" rel="stylesheet">

    <style>
        .navbar{
            border-radius: 0px;
            margin: 0px 0px 30px 0px;
        }
        .navbar-header{
            background: #f8f8f8;
        }
    </style>

    {!! $public->where('name', 'HEADER_CSS')->first()->value ?? '' !!}


    @stack('styles')

</head>

<body class="nav-md">
@include('3d.layouts.public-parts.top-nav')
<div class="container body">
    <div class="main_container">



        <!-- page content -->
        <div class="container" role="main">


            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@yield('title')</h2>

                            <ul class="nav navbar-right panel_toolbox">

                            </ul>

                            <div class="clearfix"></div>

                        </div>
                        <div class="x_content">
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


    </div>
</div>

<!-- jQuery -->
<script src="/printing/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/printing/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/printing/js/fastclick.js"></script>
<!-- NProgress -->
<script src="/printing/js/nprogress.js"></script>
<!-- Chart.js -->
<script src="/printing/js/Chart.min.js"></script>
<!-- gauge.js -->
<script src="/printing/js/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/printing/js/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/printing/js/icheck.min.js"></script>
<!-- Skycons -->
<script src="/printing/js/skycons.js"></script>
<!-- Flot -->
<script src="/printing/js/jquery.flot.js"></script>
<script src="/printing/js/jquery.flot.pie.js"></script>
<script src="/printing/js/jquery.flot.time.js"></script>
<script src="/printing/js/jquery.flot.stack.js"></script>
<script src="/printing/js/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/printing/js/jquery.flot.orderBars.js"></script>
<script src="/printing/js/jquery.flot.spline.min.js"></script>
<script src="/printing/js/curvedLines.js"></script>
<!-- DateJS -->
<script src="/printing/js/date.js"></script>
<!-- JQVMap -->
<script src="/printing/js/jquery.vmap.js"></script>
<script src="/printing/js/jquery.vmap.world.js"></script>
<script src="/printing/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/printing/js/moment.min.js"></script>
<script src="/printing/js/daterangepicker.js"></script>

@stack('custom-scripts')

<!-- Custom Theme Scripts -->
<script src="/printing/js/custom.min.js"></script>


@stack('scripts')

{!! $public->where('name', 'FOOTER_JS')->first()->value ?? '' !!}
<!-- IP: {{ Request::server('HTTP_REFERER') }}-->
</body>
</html>
